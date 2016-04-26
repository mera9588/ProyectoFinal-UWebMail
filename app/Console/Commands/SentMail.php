<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Emails;
//Hay que definir el nombre con el que va ha quedar
use DB;
use Auth;
use Mail;

class SentMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SentMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command send the mails with status=0';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $correo = Emails::where('estado', '=', '0')->get();

        foreach ($correo as $mail) {

            $mailArray =array('id'=> $mail->id,'mail'=> $mail->destinatario,'subject'=> $mail->asunto,
                'content'=> $mail->mensaje,'from'=>'melvin.r.a.cr@gmail.com');

        //Separate emails recorded in the field receiver
            Mail::send('emails.mailView', $mailArray, function ($message) use
                ($mailArray) {
                    $message->subject($mailArray['subject']);
                    $message->from($mailArray['from']);
                    $message->to(explode(',',$mailArray['mail']));
                });

            DB::table('emails')
            ->where('id', $mailArray['id'])
            ->update(['estado' => 1]);
            sleep(5);
        }     

    }

}