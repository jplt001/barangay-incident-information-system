<?php

namespace App\Events;

use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BarangaySosAlertEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $barangayID;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $barangayID)
    {
        $this->message = $message;
        $this->barangayID = $barangayID;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ["incident-alert"];
    }

    public function broadcastAs() {
        Log::info('barangay-sos-alert-' . $this->barangayID);
        return 'barangay-sos-alert-'. $this->barangayID;
    }
}
