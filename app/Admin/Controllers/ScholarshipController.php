<?php

namespace App\Admin\Controllers;

use App\Models\Scholarship;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use App\Models\University;
use App\Models\Statics\DegreeType;
use App\Models\Statics\ProgramLanguage;
use App\Models\Statics\ScholarshipType;

class ScholarshipController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Scholarship::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('university.logo')->image($this, 70, 70);
            

            $grid->column('university.name')->sortable();
            $grid->column('degreeType.type')->sortable();
            $grid->column('program')->sortable();
            $grid->column('scholarshipType.type')->sortable();
            $grid->column('programLanguage.language')->sortable();
            $grid->column('application_deadline')->sortable();

            $grid->created_at()->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Scholarship::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('university_id', 'University')->options(
                University::all()
                    ->pluck('name', 'id')
                    ->map(function ($item, $key) {
                        return ucfirst($item);
                    })
            );

            $form->radio('scholarship_type_id', 'Scholarship Type')->options(
                ScholarshipType::all()
                    ->pluck('type', 'id')
                    ->map(function ($item, $key) {
                        return ucfirst($item);
                    })
            );

            $form->text('program');

            $form->radio('degree_type_id', 'Degree Type')->options(
                DegreeType::all()
                    ->pluck('type', 'id')
                    ->map(function ($item, $key) {
                        return ucfirst($item);
                    })
            );

            $form->radio('program_language_id', 'Program Language')->options(
                ProgramLanguage::all()
                    ->pluck('language', 'id')
                    ->map(function ($item, $key) {
                        return ucfirst($item);
                    })
            );

            $form->textarea('benefits')->placeholder('Benefit 1|Benefit 2|....|Benefit N');
            $form->textarea('requirements')->placeholder('Requirement 1|Requirement 2|....|Requirement N');
            $form->textarea('other_information');
            

            $form->number('number_of_seats');
            $form->date('application_deadline')->format('DD-MM-YYYY');


            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
