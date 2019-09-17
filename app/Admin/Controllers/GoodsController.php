<?php

namespace App\Admin\Controllers;

use App\Model\GoodsModel;
use App\Model\CategoryModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\GoodsModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $content)
    {
        return $content
            ->title("商品管理")
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }
    protected function grid()
    {
        $grid = new Grid(new GoodsModel);

        $grid->column('id', __('Id'));
        $grid->column('cid', __('Cid'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('goods_img', __('Goods img'))->image();
        $grid->column('content', __('Content'));
        $grid->column('goods_pricing', __('Goods pricing'));
        $grid->column('goods_price', __('Goods price'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GoodsModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cid', __('Cid'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_img', __('Goods img'));
        $show->field('content', __('Content'));
        $show->field('goods_pricing', __('Goods pricing'));
        $show->field('goods_price', __('Goods price'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsModel);

        $form->select('cid', __('分类'))->options(CategoryModel::selectOptions());
        $form->text('goods_name', __('Goods name'));
        $form->image('goods_img', __('Goods img'));
        $form->textarea('content', __('Content'));
        $form->number('goods_pricing', __('Goods pricing'));
        $form->number('goods_price', __('Goods price'));

        return $form;
    }
}
