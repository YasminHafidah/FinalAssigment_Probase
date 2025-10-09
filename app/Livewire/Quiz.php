<?php

namespace App\Livewire;

use id;
use App\Models\Project;
use App\Models\UserAnswer;
use Livewire\Component;
use App\Models\ValidationAttemp;
use App\Models\ValidationQuestion;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class Quiz extends Component
{

    public string $status = 'instruksi';
    public Project $project;

    public array $idQuestions = [];
    public int $QuestionIndex = 0;
    public int $totalPertanyaan = 0;
    public $JawabanUser;
    public array $jawaban = [];
    public $attemp_id;

    public function mount(Project $project)
    {
        //ngurutin pertanyaan berdasarkan urutan materi sama nanti pertanyaan tipe multiple dulu baru essay
        $materials = $project->project_materials()->with([
            'questions' => function ($query) {
                $query->orderByRaw("FIELD(type, 'multiple', 'essay')");
            }
        ])->orderBy('urutan')->get();

        //masukin id-id pertanyaan dari project itu yg merupakan kumpulan pertanyaan dari beberapa material
        $idPertanyaanProject = [];
        foreach ($materials as $material) {
            $idPertanyaanProject = array_merge($idPertanyaanProject, $material->questions->pluck('id')->toArray());
        }

        //simpan semua id_pertanyaan yg didapet ke variabel publik supaya bisa diakses sama method yg lain
        $this->idQuestions = $idPertanyaanProject;

        //hitung banyak pertannya di project ini
        $this->totalPertanyaan = count($this->idQuestions);
    }

    public function getCurrentQuestionProperty()
    {
        //kalau misal masih ada pertanyaan tampilin
        if (isset($this->idQuestions[$this->QuestionIndex])) {
            return ValidationQuestion::with('options')->find($this->idQuestions[$this->QuestionIndex]);
        }
        return null;
    }

    public function mulaiValidasi()
    {
        //aktifin status
        if ($this->totalPertanyaan > 0) {
            $this->status = 'mulai';
            $attemp = ValidationAttemp::create([
                'user_id' => Auth::user()->id,
                'project_id' => $this->project->id,
                'completed_at' => now()
            ]);
            $this->attemp_id = $attemp->id;
        } else {
            $this->status = 'selesai';
        }
    }

    public function simpanValidasi()
    {
        if (!$this->attemp_id) {
            return redirect('/project/' . $this->project->slug)
                ->with('message', 'Error');
        }

        foreach ($this->jawaban as $question_id => $answer) {
            $question = ValidationQuestion::find($question_id);

            if ($question->type === 'multiple') {
                UserAnswer::create([
                    'validation_attemp_id' => $this->attemp_id,
                    'question_id' => $question_id,
                    'option_choice_id' => $answer,
                    'essay_answer' => null
                ]);
            } elseif ($question->type === 'essay') {
                UserAnswer::create([
                    'validation_attemp_id' => $this->attemp_id,
                    'question_id' => $question_id,
                    'option_choice_id' => null,
                    'essay_answer' => $answer
                ]);
            }
        }
        $attemp = ValidationAttemp::find($this->attemp_id);
        $attemp->completed_at = now();
        $attemp->save();

        return redirect('/project')
            ->with('message', 'Validasi berhasil');
    }

    public function submitJawaban()
    {
        $this->validate([
            'JawabanUser' => 'required'
        ]);

        $idPertanyaanNow = $this->idQuestions[$this->QuestionIndex];
        $this->jawaban[$idPertanyaanNow] = $this->JawabanUser;

        if ($this->QuestionIndex < $this->totalPertanyaan - 1) {
            $this->QuestionIndex++;
            $this->reset('JawabanUser');
        } else {
            $this->status = 'selesai';
        }
    }

    public function lompatSoal($indeksPertanyaan)
    {
        if ($this->status != 'mulai') {
            return;
        }
        if ($indeksPertanyaan >= 0 && $indeksPertanyaan < $this->totalPertanyaan) {
            $this->QuestionIndex = $indeksPertanyaan;
        }
    }

    public function render()
    {
        return view('livewire.quiz', [
            'question' => $this->currentQuestion,
        ]);
    }
}
