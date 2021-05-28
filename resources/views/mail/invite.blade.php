<p class="mb-1">{{ $data['name'] }}さん</p>
<p class="mt-2">こんにちは。Global Talent Library事務局です。</p>
<p class="mt-2">この度、企業から{{ $data['name'] }}との面会希望が届きました。<br>
下記の詳細をご確認いただき、面会に応じるかどうかを教えて下さい。<br>
【面会希望企業】{{ $data['entity_name'] }}<br>
【面会候補日】{{ $data['meet_option_day'] }}<br>
【面会方法】{{ $data['meet_way'] }}<br>
【面会方法】{{ $data['meet_purpose'] }}<br>
【お誘いのメッセージ】<br>
{{ $data['purpose_detail'] }}</p>
<p class="mt-2">ご確認のほど、よろしくお願い申し上げます。</p>