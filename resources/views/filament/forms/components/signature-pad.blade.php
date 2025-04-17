<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div wire:ignore
        x-data="{
            signaturePad: null,
            error: null,
            state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
            loading: true,
            
            init() {
                this.checkLibrary();
            },
            
            checkLibrary() {
                // Verifica a cada 100ms se a biblioteca foi carregada
                const checkInterval = setInterval(() => {
                    if (typeof SignaturePad !== 'undefined') {
                        clearInterval(checkInterval);
                        this.setupSignaturePad();
                    } else if (!this.loading) {
                        clearInterval(checkInterval);
                        this.error = 'Biblioteca de assinatura não carregada. Recarregue a página.';
                    }
                }, 100);
                
                // Timeout após 3 segundos
                setTimeout(() => {
                    clearInterval(checkInterval);
                    if (typeof SignaturePad === 'undefined') {
                        this.error = 'Biblioteca de assinatura não carregada. Recarregue a página.';
                    }
                    this.loading = false;
                }, 3000);
            },
            
            setupSignaturePad() {
                try {
                    const canvas = this.$refs.canvas;
                    this.signaturePad = new SignaturePad(canvas, {
                        backgroundColor: 'rgb(255, 255, 255)',
                        penColor: 'rgb(0, 0, 0)'
                    });

                    if (this.state) {
                        this.signaturePad.fromDataURL(this.state);
                    }
                    this.loading = false;
                } catch (e) {
                    console.error('Error setting up signature pad:', e);
                    this.error = 'Erro ao configurar a assinatura. Recarregue a página.';
                    this.loading = false;
                }
            },
            
            clearSignature() {
                if (this.signaturePad) {
                    this.signaturePad.clear();
                    this.$wire.set('{{ $getStatePath() }}', null);
                    this.error = null;
                }
            },
            
            saveSignature() {
                if (this.signaturePad && !this.signaturePad.isEmpty()) {
                    this.$wire.set('{{ $getStatePath() }}', this.signaturePad.toDataURL('image/png'));
                    this.error = null;
                } else {
                    this.error = 'Por favor, forneça uma assinatura';
                }
            }
        }"
        class="space-y-4"
    >
        <div class="signature-container">
            <template x-if="loading">
                <div class="text-center py-4 text-gray-500">
                    Carregando componente de assinatura...
                </div>
            </template>
            
            <canvas 
                x-ref="canvas" 
                class="signature-canvas w-full h-48 border rounded-lg"
                x-show="!loading"
                :class="{ 'border-red-500': error }"
            ></canvas>
            
            <template x-if="error">
                <p class="text-sm text-red-500 mt-2" x-text="error"></p>
            </template>
        </div>
        
        <div class="flex gap-2 mt-4" x-show="!loading">
            <button type="button" 
                @click="clearSignature"
                class="filament-button filament-button-size-sm bg-gray-600 text-white"
            >
                Limpar
            </button>
            
            <button type="button" 
                @click="saveSignature"
                class="filament-button filament-button-size-sm bg-primary-600 text-white"
            >
                Salvar Assinatura
            </button>
        </div>
    </div>
</x-dynamic-component>

@pushOnce('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <style>
        .signature-canvas {
            touch-action: none;
            background: white;
        }
    </style>
@endPushOnce

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('signaturePad', (config) => ({
        signaturePad: null,
        error: null,
        state: null,

        init() {
            this.state = this.$wire.get(config.statePath);
            
            Livewire.on('signaturepad-init', (event) => {
                if (event.statePath === config.statePath) {
                    this.setupSignaturePad();
                }
            });
            
            this.setupSignaturePad();
        },
        
        setupSignaturePad() {
            if (typeof SignaturePad === 'undefined') {
                this.error = 'Biblioteca de assinatura não carregada. Recarregue a página.';
                return;
            }

            const canvas = this.$refs.canvas;
            this.signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)',
                penColor: 'rgb(0, 0, 0)'
            });

            if (this.state) {
                this.signaturePad.fromDataURL(this.state);
            }
        },
        
        clearSignature() {
            if (this.signaturePad) {
                this.signaturePad.clear();
                this.$wire.set(config.statePath, null);
                this.error = null;
            }
        },
        
        saveSignature() {
            if (this.signaturePad && !this.signaturePad.isEmpty()) {
                this.$wire.set(config.statePath, this.signaturePad.toDataURL('image/png'));
                this.error = null;
            } else {
                this.error = 'Por favor, forneça uma assinatura';
            }
        }
    }));
});
</script>
@endpush