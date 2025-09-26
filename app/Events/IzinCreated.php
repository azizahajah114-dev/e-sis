<?php

// app/Events/IzinCreated.php
namespace App\Events;

use App\Models\Izin;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class IzinCreated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $izin;

    public function __construct(Izin $izin)
    {
        $this->izin = $izin;
    }

    public function broadcastOn()
    {
        return new Channel('izin-channel'); // channel umum
    }

    public function broadcastAs()
    {
        return 'izin.created';
    }
}
