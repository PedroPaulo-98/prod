@php
    // Valores padrão seguros
    $statePath = $getStatePath();
    $saveFormat = $saveFormat ?? 'base64';
@endphp

<div
    x-data="{
        imageData: null,
        videoStream: null,
        isCameraOpen: false,
        
        init() {
            // Configuração inicial quando o componente é montado
            Livewire.on('camerainput-init', (event) => {
                if (event.statePath === '{{ $getStatePath() }}') {
                    this.setupCamera();
                }
            });
            
            this.setupCamera();
        },
        
        setupCamera() {
            this.videoElement = this.$refs.video;
            this.canvasElement = this.$refs.canvas;
        },
        
        async openCamera() {
            try {
                this.videoStream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: 'environment' } 
                });
                this.videoElement.srcObject = this.videoStream;
                this.isCameraOpen = true;
            } catch (error) {
                console.error('Error accessing camera:', error);
                $dispatch('notify', {
                    title: 'Erro na Câmera',
                    message: 'Não foi possível acessar a câmera. Verifique as permissões.',
                    status: 'danger',
                });
            }
        },
        
        capturePhoto() {
            const context = this.canvasElement.getContext('2d');
            this.canvasElement.width = this.videoElement.videoWidth;
            this.canvasElement.height = this.videoElement.videoHeight;
            context.drawImage(this.videoElement, 0, 0);
            
            this.imageData = this.canvasElement.toDataURL('image/jpeg', 0.7);
            this.closeCamera();
            
            this.$wire.set('{{ $getStatePath() }}', this.imageData);
        },
        
        closeCamera() {
            if (this.videoStream) {
                this.videoStream.getTracks().forEach(track => track.stop());
                this.videoStream = null;
                this.videoElement.srcObject = null;
            }
            this.isCameraOpen = false;
        },
        
        clearPhoto() {
            this.imageData = null;
            this.$wire.set('{{ $getStatePath() }}', null);
        }
    }"
    x-cloak
    class="space-y-4"
>
    <!-- Preview da foto capturada -->
    <div x-show="imageData" class="flex flex-col items-center">
        <img :src="imageData" alt="Foto capturada" class="rounded-lg border border-gray-300 max-h-64">
        <button 
            type="button" 
            @click="clearPhoto"
            class="mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
        >
            Remover Foto
        </button>
    </div>

    <!-- Vídeo da câmera -->
    <div x-show="isCameraOpen" class="flex flex-col items-center">
        <video x-ref="video" autoplay playsinline class="rounded-lg border border-gray-300 max-h-64"></video>
        <button 
            type="button" 
            @click="capturePhoto"
            class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
        >
            Capturar Foto
        </button>
    </div>

    <!-- Botão para abrir a câmera -->
    <button 
        type="button" 
        x-show="!isCameraOpen && !imageData"
        @click="openCamera"
        class="w-full px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
    >
        Abrir Câmera
    </button>

    <!-- Canvas oculto para processamento -->
    <canvas x-ref="canvas" class="hidden"></canvas>
</div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('cameraInput', (config) => ({
        imageData: null,
        videoStream: null,
        videoElement: null,
        canvasElement: null,
        isCameraOpen: false,

        init() {
            this.videoElement = this.$refs.video;
            this.canvasElement = this.$refs.canvas;
        },

        async openCamera() {
            try {
                this.videoStream = await navigator.mediaDevices.getUserMedia({ 
                    video: { 
                        facingMode: 'environment' 
                    } 
                });
                this.videoElement.srcObject = this.videoStream;
                this.isCameraOpen = true;
            } catch (error) {
                console.error('Error accessing camera:', error);
                this.$dispatch('notify', {
                    title: 'Erro na Câmera',
                    message: 'Não foi possível acessar a câmera. Verifique as permissões.',
                    status: 'danger',
                });
            }
        },

        closeCamera() {
            if (this.videoStream) {
                this.videoStream.getTracks().forEach(track => track.stop());
                this.videoStream = null;
                this.videoElement.srcObject = null;
            }
            this.isCameraOpen = false;
        },

        capturePhoto() {
            const context = this.canvasElement.getContext('2d');
            this.canvasElement.width = this.videoElement.videoWidth;
            this.canvasElement.height = this.videoElement.videoHeight;
            context.drawImage(this.videoElement, 0, 0);
            
            this.imageData = this.canvasElement.toDataURL('image/jpeg', 0.7);
            this.closeCamera();
            
            this.$wire.set(config.statePath, this.imageData);
        },

        clearPhoto() {
            this.imageData = null;
            this.$wire.set(config.statePath, null);
        }
    }));
});
</script>
@endpush