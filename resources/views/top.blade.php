<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--  ----------------------------------------------------------------------  -->
        <!--  次の <META> 要素を、HTML の <HEAD>タグ間に追加してください。必要に応じて、charset                  -->
        <!--  パラメータを変更して、HTML ページの文字コードを指定してください。                                     -->
        <!--  ----------------------------------------------------------------------  -->
        <meta HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
        <!--  ----------------------------------------------------------------------  -->
        <!--  注意: これらの項目は、省略可能なデバッグ用要素です。デバッグモードでテストを行う場合は、これらの行をコメント解除してください。        -->
        <!--  <input type="hidden" name="debug" value=1>                              -->
        <!--  <input type="hidden" name="debugEmail"                                  -->
        <!--  value="tnakamura@sociarise.co.jp">                                      -->
        <!--  ----------------------------------------------------------------------  -->

        <title>{{ config('app.name', 'Global Talent Library') }}</title>

        <!-- Scripts -->
        @if(app('env') == 'production')
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        @else
        <script src="{{ asset('js/app.js') }}" defer></script>
        @endif

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <!-- <link href="https://fonts.googleapis.com/css?family=Jomolhari" rel="stylesheet"> -->

        <!-- Styles -->
        @if(app('env') == 'production')
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
        @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        @endif
        <style>
            body {
                background-color: #f6f8f8;
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
    <div class="pg-top">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a class="text-decoration-none" href="{{ url('/home') }}">Global Talentの一覧へ</a>
            @else
                <a class="text-decoration-none" href="{{ route('login') }}">ログイン</a>
                <a class="text-decoration-none" data-toggle="modal" data-target="#applicationForm" href="#">利用申込</a>
                
                <!-- @if (Route::has('register'))
                    <a class="text-decoration-none" href="{{ route('register') }}">新規登録</a>
                @endif -->
            @endauth
        </div>
        <div class="modal fade" id="applicationForm" tabindex="-1" role="dialog" aria-labelledby="applicationFormTitle" aria-hidden="true">
            <div id="modal-dialog-appform" class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h5 class="modal-title text-white" id="applicationFormTitle">Global Talent Library利用申込フォーム</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" class="h-adr">
                        @csrf
                        <input type="hidden" name="oid" value="00D2v000001Xv2Z">
                        <input type="hidden" name="retURL" value="https://sociarise.co.jp/service-guide/">
                        <input type="hidden" id="lead_source" name="lead_source" value="Web">
                        <input type="hidden" id="rating" name="rating" value="Warm">
                        <input type="hidden" id="00N2u000000SqF0" name="00N2u000000SqF0" title="問い合わせ種別" value="Global Talent Library">
                        <input type="hidden" class="p-country-name" value="Japan">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company">会社名</label>
                                    <input type="text" maxlength="40" size="20" class="form-control" id="company" name="company" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">役職</label>
                                    <input type="text" maxlength="40" size="20" class="form-control" id="title" name="title" value="" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="last_name">姓</label>
                                <input type="text" maxlength="80" size="20" class="form-control" id="last_name" name="last_name" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="first_name">名</label>
                                <input type="text" maxlength="40" size="20" class="form-control" id="first_name" name="first_name" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="email">メールアドレス</label>
                                <input type="email" maxlength="80" size="20" class="form-control" id="email" name="email" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="phone">電話番号</label>
                                <input type="tel" minlength="10" maxlength="17" size="20" class="form-control" id="phone" name="phone" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                <label for="zip">郵便番号</label>
                                <input type="text" class="form-control p-postal-code" id="zip" maxlength="8" name="zip" size="8" value="" placeholder="107-0052" required>
                                </div>
                                <div class="form-group col-md-3">
                                <label for="state">都道府県</label>
                                <input type="text" class="form-control p-region" id="state" maxlength="20" name="state" size="20" value="" placeholder="東京都" required>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="city">市区町村</label>
                                <input type="text" maxlength="40" size="20" class="form-control p-locality" id="city" name="city" value="" placeholder="港区" required>
                                </div>                                        
                            </div>
                            <div class="form-group">
                                <label for="street">町名・番地</label>
                                <textarea class="form-control p-street-address p-extended-address" id="street" rows="3" columns="20" name="street" value="" placeholder="赤坂4-13-5 赤坂オフィスハイツ279号" required></textarea>
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label" for="00N2u000000SqEl"><a href="http://sociarise.co.jp/wp-content/uploads/policy.pdf" rel="noopener noreferrer" target="_blank" class="text-decoration-none">個人情報保護方針</a>に同意する</label>
                                <input id="00N2u000000SqEl" name="00N2u000000SqEl" type="checkbox" value="1" required>    
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">送信する</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <section class="full-height top-img">
            <p class="ccp-en movetext1">Global Talent Library</p>
            <h1 class="ccp-ja movetext2">世界中の才能が集う</h1>
        </section>
        <section class="what-is-gt">
            <div class="container-fluid">
                <div class="row py-5">
                    <div class="col-md-9 col-lg-8 col-xl-7 offset-xl-2 descr">
                        <h2 class="text-center">Global Talentとは？</h2>
                        <h6 class="text-center pb-3">今の限界を打破する、未来の戦力</h6>
                        <p class="py-3 pl-md-3 pl-xl-5"><span class="h1 text-primary pr-3">才能</span>国の代表として最高の教育を享受</p>
                        <p class="py-3 pl-md-5 gisecond text-center"><span class="h1 text-primary pr-3">貪欲</span>現状に満足せず、挑戦し続けるタフさ</p>
                        <p class="py-3 pr-xl-5 text-right"><span class="h1 text-primary pr-3">知日</span>日本を知り、日本語を扱える</p>
                    </div>
                    <div class="impr"></div>
                </div>
            </div>
        </section>
        <section class="meet-to-know">
            <div class="container-fluid">
                <div class="row py-5">
                    <div class="impr"></div>
                    <div class="col-md-9 offset-md-3 descr">
                        <h2 class="text-center">話せばわかる、その可能性</h2>
                        <h6 class="text-center pb-3">だから出会うための工夫を凝らす</h6>
                        <p class="py-3 first"><span class="h1 text-success pr-3">対話動画</span>どのレベルで会話が可能なのかが事前にわかる</p>
                        <p class="py-3 second"><span class="h1 text-success pr-3">PR資料</span>強みや売りがどこにあるのか自由形式の資料でわかる</p>
                        <p class="py-3"><span class="h1 text-success pr-3">専任CA</span>外国人専任キャリアアドバイザーが出会いを紡ぐ</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="gt-sample">
        <div class="container">
            <h2 class="display-4">Global Talent Libraryでは、<br>こんな人たちと出会えます。</h2>
            <div class="row">
                <div class="col-lg img">
                    <img class="img-fluid" src="../../images/sandeep-min.jpg">
                </div>
                <div class="col-lg intro">
                    <h3 class="h1">サンディープ</h3>
                    <h4>東北大学大学院　情報科学研究科</h4>
                    <p>日本にはITの基礎研究・技術力はあれど、実社会にあまり反映されず、もったいない。そこに自分の価値がある。</p>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#gt-sample1">動画を見る</button>
                    <div class="modal fade" id="gt-sample1" tabindex="-1" role="dialog" aria-labelledby="gt-sample1Title" aria-hidden="true">
                        <div id="modal-dialog-gt-sample1" class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="gt-sample1Title">サンプル1のお名前</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/499558457?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Global Talent サンディープさん"></iframe></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg order-lg-last img">
                    <img class="img-fluid" src="../../images/sharma-min.jpg">
                </div>
                <div class="col-lg order-lg-first intro">
                    <h3 class="h1">シャルマ</h3>
                    <h4>東京大学大学院　文化人類学研究生</h4>
                    <p>自走型のお手本。「人に伝える」ことに高い関心を持ち、ブログ・ウェブサイトの構築からSEOまで自主学習で実行。</p>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#gt-sample2">動画を見る</button>
                    <div class="modal fade" id="gt-sample2" tabindex="-1" role="dialog" aria-labelledby="gt-sample2Title" aria-hidden="true">
                        <div id="modal-dialog-gt-sample2" class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="gt-sample2Title">サンプル2のお名前</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="padding:66.67% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/529243796?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Global Talent シャルマさん"></iframe></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg img">
                    <img class="img-fluid" src="../../images/yucheng-min.jpg">
                </div>
                <div class="col-lg intro">
                    <h3 class="h1">ユーチェン</h3>
                    <h4>東京工業大学大学院　情報通信系情報通信コース</h4>
                    <p>機械学習を専門に研究し、データサイエンティスト・データアナリストとしてのキャリアを追求する高度人材。</p>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#gt-sample3">動画を見る</button>
                    <div class="modal fade" id="gt-sample3" tabindex="-1" role="dialog" aria-labelledby="gt-sample3Title" aria-hidden="true">
                        <div id="modal-dialog-gt-sample3" class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="gt-sample3Title">サンプル3のお名前</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/527595045?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Global Talent オンユーチェンさん"></iframe></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <section class="service-flow pt-5">
        <div class="container-fluid">
            <h2 class="text-center mt-5">サービスの流れ</h2>
            <h6 class="text-center pb-3">刺激的な出会いまでの５ステップ</h6>
            <div class="row justify-content-center">
                <div class="col-xl-2 col-md-4 px-3 m-1 steps">
                    <h6>STEP <span class="text-primary">1</span></h6>
                    <h3>利用申込</h3>
                    <img class="img-fluid my-3" src="../../images/signup.png">
                    <p class="text-left"><a class="text-decoration-none" data-toggle="modal" data-target="#applicationForm" href="#">利用申込</a>より利用登録をお願いします。</p>
                    <p class="text-left"><small class="text-muted">審査の結果、ご利用をお断りさせていただく場合もございます。</small></p>
                </div>
                <div class="col-xl-2 col-md-4 px-3 m-1 steps">
                    <h6>STEP <span class="text-primary">2</span></h6>
                    <h3>閲覧</h3>
                    <img class="img-fluid my-3" src="../../images/look-into.png">
                    <p class="text-left">厳選されたグローバル人材をご覧ください。</p>
                </div>
                <div class="col-xl-2 col-md-4 px-3 m-1 steps">
                    <h6>STEP <span class="text-primary">3</span></h6>
                    <h3>招待</h3>
                    <img class="img-fluid my-3" src="../../images/invite.png">
                    <p class="text-left">気になったら面会依頼を送りましょう。</p>
                    <p class="text-left"><small class="text-muted">「お気に入り」に追加して、会う前の質問・確認もできます。</small></p>
                </div>
                <div class="col-xl-2 col-md-4 px-3 m-1 steps">
                    <h6>STEP <span class="text-primary">4</span></h6>
                    <h3>設定</h3>
                    <img class="img-fluid my-3" src="../../images/appointment.png">
                    <p class="text-left">専任CAが面会日時の設定を致します。</p>
                    <p class="text-left"><small class="text-muted">面会不可の場合、理由をフィードバック致します。</small></p>
                </div>
                <div class="col-xl-2 col-md-4 px-3 m-1 steps">
                    <h6>STEP <span class="text-primary">5</span></h6>
                    <h3>面会</h3>
                    <img class="img-fluid my-3" src="../../images/meet.png">
                    <p class="text-left">お互いの未来にとって素晴らしい出会いを！</p>
                </div>
            </div>
        </div>
        </section>
        <section class="scenes">
        <div class="container-fluid">
            <h2 class="text-center">活用シーン</h2>
            <h6 class="text-center pb-3">まず会うことから全ては始まる</h6>
            <div class="card-deck">
                <div class="card">
                    <img src="../../images/internship-min.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">インターンシップに誘う</h5>
                        <p class="card-text">実務を通して適性や相性を図るのはグローバル人材の採用で最も合理的な手法です。<br>彼らもまた成長の機会に貪欲で、期待以上の活躍が期待できます。</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../../images/recruiting-min.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">採用選考を実施する</h5>
                    <p class="card-text">良さそうな人を見つけたら積極的に採用選考に誘いましょう。会社の本気度を優秀な人材は感じ取り、自身のキャリアとして真剣に考えます。</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../../images/shake-hands-min.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">ネットワーキングのために</h5>
                    <p class="card-text">採用だけがGlobal Talent Libraryの使い道ではありません。彼らとの人脈形成は、グローバル化の進む世界で重要な意味を持ち、確かな価値をもたらすでしょう。</p>
                    </div>
                </div>
            </div>
        </div>
        </section>
            <!-- <h2 class="text-center mt-5">ユーザーの声</h2>
            <h5 class="text-center">喜びの声を集まっています</h5>
            <div class="user-voice row justify-content-center">
                <div class="col-md-3">
                    <h4>Voice１</h4>
                    <p>テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
                <div class="col-md-3">
                    <h4>Voice２</h4>
                    <p>テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
                <div class="col-md-3">
                    <h4>Voice３</h4>
                    <p>テキストテキストテキストテキストテキストテキストテキスト</p>
                </div>
            </div> -->
        <section class="faq">
            <div class="container-fluid">
                <div class="justify-content-center row">
                    <div class="col-sm-10">
                    <nav class="accordion arrows">
                        <h2 class="text-center">よくある質問</h2>
                        <h6 class="text-center pb-3">FAQ</h6>
                        <input type="radio" name="accordion" id="cb1" />
                        <section class="box">
                            <label class="box-title" for="cb1">費用はかかりますか？</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content">Global Talent Libraryは<b>無料で</b>ご利用いただけます。採用や育成、定着面での課題解決は、別途有料のサービスをご用意しておりますので、お気軽にご相談ください。詳しくは<a href="https://sociarise.co.jp/service-guide/" class="text-decoration-none" rel="noopener noreferrer" targer="_blank">こちら</a></div>
                        </section>
                        <input type="radio" name="accordion" id="cb2" />
                        <section class="box">
                            <label class="box-title" for="cb2">会える人数に制限はありますか？</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content">制限はありません。希望すれば<b>掲載者全員と会うこともできます</b>。但し、面会目的は毎回明示していただき、掲載者の同意を得られた場合のみお引き合わせ致します。</div>
                        </section>
                        <input type="radio" name="accordion" id="cb3" />
                        <section class="box">
                            <label class="box-title" for="cb3">利用申込時の審査はどのような基準で行われますか？</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content">Global Talent Libraryは、参加者の皆さまが安心してご利用いただける場にすることを目指しております。企業・団体様に関しては、実態ある法人であること、各外国人コミュニティでの評判等を総合的に勘案して利用申込みを受け付けております。</div>
                        </section>
                        <input type="radio" name="accordion" id="acc-close" />
                    </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="module">
        $(window).on('load',function(){
            $('.movetext1').children().addBack().contents().each(function() {
            if (this.nodeType == 3) {
                $(this).replaceWith($(this).text().replace(/(\S)/g, '<span>$1</span>'));
                }
            });

            $('.movetext1').css({'opacity':1});
            for (var i = 0; i <= $('.movetext1').children('span').length; i++) {
                $('.movetext1').children('span').eq(i).delay(40*i).animate({'opacity':1},800);
            };
        });

        $(window).on('load',function(){
            $('.movetext2').children().addBack().contents().each(function() {
            if (this.nodeType == 3) {
                $(this).replaceWith($(this).text().replace(/(\S)/g, '<span>$1</span>'));
                }
            });

            $('.movetext2').css({'opacity':1});
            for (var i = 0; i <= $('.movetext2').children('span').length; i++) {
                $('.movetext2').children('span').eq(i).delay(70*i).animate({'opacity':1},800);
            };
        });

    </script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js"></script>
    </body>
</html>


