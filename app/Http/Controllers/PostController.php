<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
//Chamando o Inertia
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     *
     * Exibir uma listagem do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Pegando todos os posts
        $posts = Post::all();

        //Retornando a view(com vue) home com os posts
        return Inertia::render('Dashboard', [
            'posts' => $posts,
        ]);
    }

    /**
     * Mostre o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retornando a view com vue
        Return Inertia::render('CreatePost');

    }

    /**
     *
     * Armazene um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validando os dados
        $validacoes = [
            'title' => 'required|max:60|min:3|unique:posts',
            'content' => 'required',
        ];
        $mensagens = [
            'title.required' => 'O título é obrigatório',
            'title.max' => 'O título deve ter no máximo 255 caracteres',
            'title.min' => 'O título deve ter no mínimo 3 caracteres',
            'title.unique' => 'O título já está em uso',
            'content.required' => 'O conteúdo é obrigatório',
        ];
        $request->validate($validacoes, $mensagens);
        //Criando um novo post no banco de dados
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        //Redirecionando para a rota dashboard
        return redirect()->route('dashboard')->with('message', 'Post criado com sucesso!');
    }

    /**
     * Exiba o recurso especificado.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //Retornando a view com vue
        return Inertia::render('EditPost', [
            'post' => $post,
        ]);
    }

    /**
     *
     *  Atualize o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Validando os dados
        $validacoes = [
            'title' => 'required|max:60|min:3|unique:posts',
            'content' => 'required',
        ];
        $mensagens = [
            'title.required' => 'O título é obrigatório',
            'title.max' => 'O título deve ter no máximo 255 caracteres',
            'title.min' => 'O título deve ter no mínimo 3 caracteres',
            'title.unique' => 'O título já está em uso',
            'content.required' => 'O conteúdo é obrigatório',
        ];
        $request->validate($validacoes, $mensagens);
        //Atualizando o post no banco de dados
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        //Redirecionando para a rota dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Remova o recurso especificado do armazenamento.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Deletando o post no banco de dados
        $post->delete();
        //Redirecionando para a rota dashboard
        return redirect()->route('dashboard');
    }
}
