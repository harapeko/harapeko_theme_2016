<article id="entry-head">
    <figure class="entry-img">
        <img width="670" height="292" src="http://tipsbear.com/wp-content/uploads/002.png" class="attachment-entry-size size-entry-size wp-post-image" alt="[WordPress]カスタムメニューを使ってナビゲーションラベルとは別のメニュー名を表示させる" title="[WordPress]カスタムメニューを使ってナビゲーションラベルとは別のメニュー名を表示させる">        </figure>
    <h1>[WordPress]カスタムメニューを使ってナビゲーションラベルとは別のメニュー名を表示させる</h1>
    <div class="entry-date">
        <p class="entry-time"><span class="publided">Publided</span><span>2014.01.22</span>
        </p>
        <ul>
            <li class="entry-cat-webdesign"><a href="http://tipsbear.com/category/wordpress/" rel="category tag">WordPress</a></li>
        </ul>
    </div>
    <div class="entry-body">
        <p>良いタイトルが思いつかなかったのでいまいち分かりづらくてごめんなさい。
            <br>事の発端は、WordPressのカスタムメニュー（wp_nav_menu）の機能で設定したナビゲーションラベル以外にもう1つ違う名前で表示出来ないかな？ と思ったものです。直書きすればどうとでもなりますが、なるべく更新の手間を減らしたかったので。</p>
        <section>
            <h2>やりたいこと</h2>
            <ul>
                <li>WordPressのカスタムメニュー（wp_nav_menu）を使ってメニュー管理がしたい
                    <ul>
                        <li>メニューの名前（ナビゲーションラベル）に設定する名前とは違うもう1つのメニュー名をもちたい</li>
                        <li>もう1つの名前のみのメニューをつくりたい（ナビゲーションラベルのメニュー名を表示させず、もう1つの名前のメニューを独立させて表示させたい）</li>
                        <li>上記のメニューにも通常のカスタムメニュー同様にカレント処理がつくようにしたい</li>
                    </ul>
                </li>
            </ul>
            <p>ナビゲーションラベルとは違う名前のメニューを単体で使うなんて機会はそうないと思うので、あまり役に立たないかもしれませんが、備忘録を兼ねて実装方法を紹介します。</p>
        </section>

        <section>
            <h2>前提</h2>
            <p>たとえば下のイメージのようなグローバルナビがあります。</p>
            <p class="img"><img src="http://tipsbear.com/wp-content/uploads/002-01.png" alt=""></p>
            <p>メニューのナビゲーションラベルには「ABOUT」等の英語メニューが入っている前提とします。その状態で、「このサイトについて」「ニュースリリース」…といった感じで<strong>日本語の部分のみを独立させてページナビとして使いたい</strong>場合があるとします。</p>
            <p>とはいえ、メニューの名前（ナビゲーションラベル）は1つしか設定出来ないので、どこか違うところを使うしかありません。
                <br>出来るだけデフォルトの機能を使っていきたいので何かないかなと思いメニューの中を探してみたところ、カスタムメニューに[説明]という良さそうな入力欄があるじゃないですか。せっかくなので、これを使って表示させてみることにしました。</p>
            <p>[説明]はデフォルトだとメニューに表示されていませんので、右上にある[表示オプション]をクリックし、説明が見えるようにチェックボックスを入れておきます。私は他の項目も使う時があるので大体チェックを入れていますが、この辺は好みでいいと思います。</p>
            <p class="img"><img src="http://tipsbear.com/wp-content/uploads/002-02.png" alt=""></p>
            <p>チェックボックスをチェックすると、メニューに[説明]の入力欄が出現します。</p>
            <p class="img"><img src="http://tipsbear.com/wp-content/uploads/002-03.png" alt=""></p>
            <p>入力はできますが、「使用中のテーマが対応している場合はメニューに説明が表示されます」とあるとおり、デフォルトの状態では説明を書いても出力されません。そこで、functions.phpの出番です。</p>
        </section>

        <section>
            <h2>実装</h2>
            <p>下記をfunctions.phpに追加します。</p>
<pre><code class="php">$class_names = '';
class My_Walker extends Walker_Nav_Menu{
	function start_el(&amp;$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item-&gt;classes ) ? array() : (array) $item-&gt;classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '&lt;li ' . $value . $class_names .'&gt;';

		$attributes  = ! empty( $item-&gt;attr_title ) ? ' title="'  . esc_attr( $item-&gt;attr_title ) .'"' : '';
		$attributes .= ! empty( $item-&gt;target )     ? ' target="' . esc_attr( $item-&gt;target     ) .'"' : '';
		$attributes .= ! empty( $item-&gt;xfn )		? ' rel="'    . esc_attr( $item-&gt;xfn		) .'"' : '';
		$attributes .= ! empty( $item-&gt;url )		? ' href="'   . esc_attr( $item-&gt;url		) .'"' : '';

		$item_output = $args-&gt;before;
		$item_output .= '&lt;a'. $attributes .'&gt;';
		$item_output .= $item-&gt;description;
		$item_output .= '&lt;/a&gt;';
		$item_output .= $args-&gt;after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}</code></pre>
            <p>WordPressがメニューの出力時に使っている<a href="http://codex.wordpress.org/Class_Reference/Walker_Nav_Menu" target="_blank">Walker_Nav_Menu</a>というフックに、[説明]のみが出力されるように置換し、この[説明]のみのメニューにもWordPressが自動で付与してくれるカレント処理用のcss（<code>.current_page_item</code>等）が当たるようにしています。</p>

            <p>あとは、この[説明]のみのメニューを使う該当箇所に、Walker classの記述を加えます。</p>
<pre><code>&lt;?php
    $walker = new My_Walker;
    wp_nav_menu( array( "menu" =&gt; "メニュー名", "walker" =&gt; $walker ) );
?&gt;</code></pre>

            <p>これで[説明]だけのメニューの完成です。上記の例だと、日本語のみのメニューが出来上がったことになります。
                <br> ※パラメータは必要に応じて適宜変更してください。また、上記のメニューの出力コードは普段のメニュー出力コードと変わりませんので、その辺のcssやHTML等も状況に併せて変更してください。
            </p>
        </section>

        <section>
            <h2>補足</h2>
            <p>ちなみに、上記のように[説明]のみを独立させずに、一緒に表示させたい（たとえば「ABOUT このサイトについて」のようにくっついて表示させる）場合は、下記のサイトが参考になるかと思います。</p>
            <ul class="entry-refs">
                <li><a href="http://www.oto-con.com/2012/03/26/how-to-show-the-description-of-wp_nav_menu-in-wordpress/" target="_blank">WordPressのWp_nav_menuで説明を表示させる – Otokuni Consulting Co. Ltd.</a></li>
                <li><a href="http://kachibito.net/wordpress/show-the-description-of-the-menu.html" target="_blank">WordPressのカスタムメニュー（wp_nav_menu）を使って、サブタイトル付きのナビゲーションを実装する – かちびと.net</a></li>
            </ul>

            <p>WordPressのカスタムメニューは使い勝手がよくとても便利なので、カスタムメニューをよく使う方は<a href="http://codex.wordpress.org/Function_Reference/Walker_Class" target="_blank">Walker class</a>のことを覚えておくと役立つ時がくるかもしれません。
                <br>この記事が何かの参考になりましたら幸いです。</p>
        </section>
        <dl class="sLink">
            <dt>参考サイト<span>Special Thanks!</span></dt>
            <dd><a href="http://wordpress.stackexchange.com/questions/36812/how-to-style-current-page-menu-item-when-using-a-walker" target="_blank">How to style current page menu item when using a walker – WordPress Answers</a><span>カレント処理、大変助かりました…！</span></dd>
            <dd><a href="http://stylizedweb.com/2010/08/16/use-the-link-description-in-wordpress-3-0-menus/" target="_blank">Use the Link Description in WordPress 3.0 Menus – stylizedweb</a></dd>
            <dd><a href="http://www.nxworld.net/wordpress/wp-nav-menu.html" target="_blank">WordPress：カスタムメニュー（wp_nav_menu）について – NxWorld</a></dd>
            <dd><a href="http://blog.neo.jp/dnblog/index.php?module=Blog&amp;action=Entry&amp;blog=pg&amp;entry=2684&amp;rand=6b14e" target="_blank">WordPressで、カスタムメニューの表示内容を変更する方法 – ふじこのプログラミング奮闘記</a></dd>
        </dl>

        <div class="foot-sns-area">
        </div>
        <div class="foot-relation-area">
            <h3>関連記事</h3>
            <ul>
                <li>
                    <a href="http://tipsbear.com/wordpress-radio-customfields/"><img width="670" height="292" src="http://tipsbear.com/wp-content/uploads/005.png" class="attachment-entry-size size-entry-size wp-post-image" alt="[WordPress]カスタムフィールドでラジオボタンを作り、ラジオボタンの値で条件分岐（ループ内・外・組み込み）させる"></a>
                    <p><a href="http://tipsbear.com/wordpress-radio-customfields/">[WordPress]カスタムフィールドでラジオボタンを作り、ラジオボタンの値で条件分岐（ループ内・外・組み込み）させる</a></p>
                </li>
                <li>
                    <a href="http://tipsbear.com/wordpress-taxonomy-get-terms-listing-in-order-of-parent-child/"><img width="670" height="292" src="http://tipsbear.com/wp-content/uploads/008.png" class="attachment-entry-size size-entry-size wp-post-image" alt="[WordPress]カスタムタクソノミーに親子関係（階層）を持たせ、複数選択したタームの並び順を親＞子の順番に表示する"></a>
                    <p><a href="http://tipsbear.com/wordpress-taxonomy-get-terms-listing-in-order-of-parent-child/">[WordPress]カスタムタクソノミーに親子関係（階層）を持たせ、複数選択したタームの並び順を親＞子の順番に表示する</a></p>
                </li>
                <li>
                    <a href="http://tipsbear.com/wordpress-taxonomy-get-query/"><img width="670" height="292" src="http://tipsbear.com/wp-content/uploads/004.png" class="attachment-entry-size size-entry-size wp-post-image" alt="[WordPress]taxonomy.phpで現在のカスタムタクソノミーを取得しカスタムフィールドの値で条件分岐させる"></a>
                    <p><a href="http://tipsbear.com/wordpress-taxonomy-get-query/">[WordPress]taxonomy.phpで現在のカスタムタクソノミーを取得しカスタムフィールドの値で条件分岐させる</a></p>
                </li>
            </ul>
        </div>

        <ul class="entry-link">html
            <li>« <a href="http://tipsbear.com/helloworld/" rel="prev">ブログはじめました</a></li>
            <li><a href="http://tipsbear.com/simple-weblog-design/" rel="next">余白の取り方が美しい、シンプルで素敵な国内ブログ…</a> »</li>
        </ul>
        <!-- /entry-body-->
    </div>
    <!-- /entry-head -->
</article>