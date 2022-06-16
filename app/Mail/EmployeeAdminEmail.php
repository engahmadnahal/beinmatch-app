<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public Employee $employee;
    public $passwordRandom;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $emp,$passwordRandom)
    {
        //
        $this->employee = $emp;
        $this->passwordRandom = $passwordRandom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@bein-match.best', 'Bein Match')
            ->subject('New Employee')
            ->markdown('emails.emp_welcome',['emp'=>$this->employee,'passwordRandom'=>$this->passwordRandom]);
    }
}
