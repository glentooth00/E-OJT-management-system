<?php


namespace App\Mail;

use App\Models\Student;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationApproved extends Mailable
{
    use SerializesModels; // Only keep the SerializesModels trait

    public $student;

    /**
     * Create a new message instance.
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }
    public function build()
    {
        return $this->subject('OJT Application Approved')
                    ->view('emails.application_approved') // Create a view for the email
                    ->with([
                        'studentName' => $this->student->fullname,
                    ]);
    }
    /**
     * Get the message envelope.
     */


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
