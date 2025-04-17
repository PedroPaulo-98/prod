<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class SignaturePad extends Field
{
    protected string $view = 'filament.forms.components.signature-pad';

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->registerListeners([
            'signaturepad::setup' => [
                function (SignaturePad $component, string $statePath): void {
                    if ($component->getStatePath() !== $statePath) {
                        return;
                    }
                    
                    $component->getLivewire()->dispatchBrowserEvent('signaturepad-init', [
                        'statePath' => $statePath,
                    ]);
                },
            ],
        ]);
    }
}