<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $xdata;
    public $xsubject;
    public $xfrom;
    public $xattachment;
    public $xtemplate;


    public function __construct($data, $subject, $from, $attachment, $template)
    {
        $this->xdata = $data;
        $this->xsubject = $subject;
        $this->xfrom = $from;
        $this->xattachment = $attachment;
        $this->xtemplate = $template;
    }

    public function build()
    {
        if (!empty($this->xattachment)) {
            return $this->subject($this->xsubject)
                ->from($this->xfrom)
                ->attach($this->xattachment)
                ->markdown($this->xtemplate)
                ->with(['data' => $this->xdata]);
        } else {
            return $this->subject($this->xsubject)
                ->from($this->xfrom)
                ->markdown($this->xtemplate)
                ->with(['data' => $this->xdata]);
        }
    }
}
