<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use CodeIgniter\HTTP\ResponseInterface;

class BlogController extends BaseController
{
    protected $m_blog;
    public function __construct()
    {
        $this->m_blog = new BlogModel();
    }

    public function index()
    {
        return view('blog/index', [
            'title' => 'Blog',
            'blogs' => $this->m_blog->orderBy('created_at', 'desc')->paginate(5, 'blogs'),
            'pager' => $this->m_blog->pager
        ]);
    }

    public function create()
    {
        return view('blog/create', [
            'title' => 'Form create blog'
        ]);
    }

    public function edit($id)
    {
        return view('blog/update', [
            'title' => 'Form update blog',
            'data' => $this->m_blog->find($id)
        ]);
    }

    public function insert()
    {
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');

        $save = $this->m_blog->save([
            'title' => $title,
            'description' => $description,
            'user_id' => session('user_id')
        ]);

        if ($save) {
            return redirect()->to(base_url('blog'))->with('alert_success', 'Berhasil menyimpan blog');
        }
        return redirect()->to(base_url('blog'))->with('alert_error', 'Gagal menyimpan blog');
    }

    public function update($id)
    {
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');

        $save = $this->m_blog->save([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'user_id' => session('user_id')
        ]);

        if ($save) {
            return redirect()->to(base_url('blog'))->with('alert_success', 'Berhasil menyimpan blog');
        }
        return redirect()->to(base_url('blog'))->with('alert_error', 'Gagal menyimpan blog');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $delete = $this->m_blog->delete($id);
        if ($delete) {
            return redirect()->to(base_url('blog'))->with('alert_warning', 'Berhasil menghapus blog');
        }
        return redirect()->to(base_url('blog'))->with('alert_error', 'Gagal menghapus blog');
    }
}
