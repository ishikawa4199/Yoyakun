@extends('layout')
@vite('resources/css/app.css')
@section('content')
   
<body class="bg-slate-100">
    <section class="bg-blue-200 relative m-auto w-full h-[600px]">    
        <div class="absolute top-[150px] right-[150px] bg-white p-8">
                <div class="">
                    <h1 class="text-4xl font-bold">ようこそ、よやくんへ</h1>
                    <p class="pt-2">より注文が簡単に！より早くお届けできます。テキストが入ります。<br>テキストが入ります。テキストが入ります。<br>
                    テキストが入ります。テキストが入ります。テキストが入ります。
                    </p>
                </div>
                <a href="" class="block text-white m-auto text-center rounded text-xl font-bold mt-12 px-4 py-2.5 bg-red-400">詳しく見る</a>
                
            </div>
    </section>
    
    
    <section>
        <h1 class="text-3xl text-center mt-8 font-bold">おすすめコース</h1>
        <div class="flex m-auto m-16 gap-3 flex-wrap">
            <div class="m-auto w-3/10 font-bold bg-white px-5 py-6 shadow-md rounded">
                <h1 class="text-center text-2xl">あいうえおかきくけこ</h1>
                <p class="py-4">テキストが入ります。テキストが入ります。テキストが入ります。<br>
                テキストが入ります。テキストが入ります。テキストが入ります。 <br>
                テキストが入ります。テキストが入ります。テキストが入ります。
                </p>
                <button class="block w-full mt-6 bg-red-300 text-white px-7 py-4 m-auto rounded">詳しくみる</button>
            </div>
    
            <div class="m-auto w-3/10 font-bold bg-white px-5 py-6 shadow-md rounded">
                <h1 class="text-center text-2xl">あいうえおかきくけこ</h1>
                <p class="py-4">テキストが入ります。テキストが入ります。テキストが入ります。<br>
                テキストが入ります。テキストが入ります。テキストが入ります。 <br>
                テキストが入ります。テキストが入ります。テキストが入ります。
                </p>
                <button class="block w-full mt-6 bg-red-300 text-white px-7 py-4 m-auto rounded">詳しくみる</button>
            </div>
            <div class="m-auto w-3/10 font-bold bg-white px-5 py-6 shadow-md rounded">
                <h1 class="text-center text-2xl">あいうえおかきくけこ</h1>
                <p class="py-4">テキストが入ります。テキストが入ります。テキストが入ります。<br>
                テキストが入ります。テキストが入ります。テキストが入ります。 <br>
                テキストが入ります。テキストが入ります。テキストが入ります。
                </p>
                <button class="block w-full mt-6 bg-red-300 text-white px-7 py-4 m-auto rounded">詳しくみる</button>
            </div>
        </div>
    
    </section>

    <section class="bg-yellow-200 w-full h-[400px]">
    <h1 class="text-3xl text-center pt-8 font-bold">料金コース</h1>  
        <div class="m-auto w-full">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-5 text-center border">学籍番号</th>
                        <th class="px-4 py-5 text-center border">名前</th>
                        <th class="px-4 py-5 text-center border">名前（フリガナ）</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td class="text-center border">22IM0177</td>
                        <td class="text-center border">石川達也</td>
                        <td class="text-center border">イシカワ　タツヤ</td>
                    </tr>
                    <tr>
                        <td class="text-center border">22IM0177</td>
                        <td class="text-center border">石川達也</td>
                        <td class="text-center border">イシカワ　タツヤ</td>
                    </tr>
                </tbody>

            </table>
        </div>


    </section>

    
    
</body>


@endsection