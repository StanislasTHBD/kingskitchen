<?php

namespace App\Mail;

use App\Models\Recette;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class RecetteInfo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Recette $recette)
    {
        $this->recette = $recette;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Regardez cette recette !' . $this->recette->name);

        // Génération et ajout du PDF en pièce jointe
        $pdf = PDF::loadView('recettes.pdf', ['recette' => $this->recette]);
        $this->attachData($pdf->output(), Str::slug($this->recette->name).'.pdf', [
            'mine' => 'application/pdf',
        ]);

        // Ajout de l'image recette en pièce jointe
        $this->attach(public_path($this->recette->image));

        return $this->view('mail.recette-info', [
            'recette' => $this->recette,
        ]);
    }
}
