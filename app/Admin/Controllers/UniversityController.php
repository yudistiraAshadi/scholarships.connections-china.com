<?php

namespace App\Admin\Controllers;

use App\Models\University;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UniversityController extends Controller
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
        return Admin::grid(University::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('logo')->image($this, 70, 70);

            $grid->column('name')->sortable();

            $grid->column('introduction')->display( function ($text) {
                return str_limit($text, 100, '...');
            });

            $grid->column('country')->sortable();
            $grid->column('governing_district')->sortable();
            $grid->column('major_municipality')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(University::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('name', 'University Name');
            
            $form->image('logo', 'University Logo')->fit(70, 70, function ($constraint) {
                $constraint->upsize();
            })->uniqueName();

            $form->textarea('introduction', 'University Introduction (optional)');

            $form->text('country', 'Country')->default('China');
            $form->text('governing_district', 'Governing District')->placeholder('Province or State');
            $form->text('major_municipality', 'Major Municipality')->placeholder('City or Town');
            $form->text('minor_municipality', 'Minor Municipality')->placeholder('District');
            $form->text('detailed_address', 'Detailed Address')->placeholder('Street Name and Number');

            $form->image('photos', 'Photos')->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->uniqueName();

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
