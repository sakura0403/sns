@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2>管理者ページ</h2>
        </div>
        

        <!-- 投稿リスト 上位20件 -->
        <h4>投稿リスト 上位20件</h4>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>テキスト内容</th>
                <th>画像</th>
                <th>違反報告数</th>
                <th>表示停止</th>
            </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
            <tr>
                <td>{{ $post['episode'] }}</td>
                <td>
                    @if(!empty($post['image']))
                    <img src="{{ asset('img/' . $post['id'] . '/' . $post['image']) }}" hight=80 width=80>
                    @endif
                </td>
                <td>{{ count($post->violation) }}</td> <!-- count($変数->リレーション) 数を求める  -->
                <td>
                    <form style="display:inline" action="{{ route('violations.destroy', ['violation'=>$post['id']]) }}" method="post" >
                        @method('DELETE')
                        @csrf    
                        <button type="submit" onclick="return confirm('「 {{ $post['episode'] }} 」の投稿を表示停止にしますか？')">表示停止</button>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
        </table>

        <!-- 一般ユーザーのリスト 上位10件 -->
        <h4>ユーザーリスト 上位10件</h4>
        <table class="table table-striped">
        <thead>
            <tr>
            <th>ユーザー名</th>
            <th>表示停止の投稿数</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['post_count'] }}</td> <!-- count($変数->リレーション) 数を求める  -->
            </tr>
            @endforeach
        </tbody>
        </table>


    </div>
</section>


@endsection