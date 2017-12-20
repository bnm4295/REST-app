<?php

namespace Suuty\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Suuty\Property;

class SaveSearch extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Property
     */
    public $property;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('emails.savesearch')->with([
                       'title' => $this->property->title,
                       'details' => $this->property->description,
                   ]);
    }
}
