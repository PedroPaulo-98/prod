<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Field;
use Closure;

class CameraInput extends Field
{
    protected string $view = 'filament.forms.components.camera-input';

    protected string $saveFormat = 'base64';

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->registerListeners([
            'camerainput::setup' => [
                function (CameraInput $component, string $statePath): void {
                    if ($component->getStatePath() !== $statePath) {
                        return;
                    }
                    
                    $component->getLivewire()->dispatchBrowserEvent('camerainput-init', [
                        'statePath' => $statePath,
                    ]);
                },
            ],
        ]);
    }

    public function saveAsBase64(bool $saveAsBase64 = true): static
    {
        $this->saveFormat = $saveAsBase64 ? 'base64' : 'file';
        return $this;
    }

    public function getSaveFormat(): string
    {
        return $this->saveFormat;
    }
}