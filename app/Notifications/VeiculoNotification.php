<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Veiculo;

class VeiculoNotification extends Notification
{
    use Queueable;

    private $veiculo;
    private $action;

    public function __construct(Veiculo $veiculo, $action)
    {
        $this->veiculo = $veiculo;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $message = new MailMessage;
        $message->subject('Notificação de Veículo');

        if ($this->action == 'created') {
            $message->line('Fala ae seu boilinha botaram um novo veiculo pra tu olha ae.');
        } else {
            $message->line('Fala ae seu boilinha atualizaram um novo veiculo teu olha ae.');
        }

        $message->line('Ta aq os detalhes dessa bagaça:')
                ->line('Placa: ' . $this->veiculo->placa)
                ->line('Renavam: ' . $this->veiculo->renavam)
                ->line('Modelo: ' . $this->veiculo->modelo)
                ->line('Marca: ' . $this->veiculo->marca)
                ->line('Ano: ' . $this->veiculo->ano);

        return $message;
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
