<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Workout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Workouts extends Component
{
    public $name;
    public $performed;
    public $workout_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function render()
    {
        return view('livewire.workouts',
            [
                'workouts' => Workout::where('user_id', Auth::id())->orderBy('performed')->get()
            ]
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->performed = '';
        $this->workout_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function store()
    {
        $this->validate(
            [
            'name' => 'required'.$this->name,
            'performed' => 'required'.$this->performed,
            ]
        );
        $data = array(
            'name' => $this->name,
            'performed' => $this->performed
        );
        $workout = Workout::updateOrCreate(['id' => $this->workout_id],$data);
        session()->flash('message', $this->workout_id ? 'Workout updated successfully.' : 'Workout created successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $workout = Workout::findOrFail($id);
        $this->workout_id = $id;
        $this->name = $workout->name;
        $this->performed = Carbon::parse($workout->performed)->format('Y-m-d\TH:i');
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $this->workout_id = $id;
        Workout::find($id)->delete();
        session()->flash('message', 'Workout deleted successfully.');
    }

}
