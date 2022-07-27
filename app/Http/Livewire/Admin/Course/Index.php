<?php

namespace App\Http\Livewire\Admin\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $course_id;

    public function render()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);
        
        return view('livewire.admin.course.index', compact('courses'));
    }

    public function deleteCourse($course_id)
    {
        $this->course_id = $course_id;
    }

    public function destroyCourse()
    {        
        $course = Course::find($this->course_id);

        $course->delete();

        session()->flash('message', 'Course deleted');
    }
}
