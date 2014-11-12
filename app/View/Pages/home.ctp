<?php

    $numberOfPosts = 3;
    $feedUrl = 'http://www.workmotor.com.br/blog/feed/';

    $content = file_get_contents($feedUrl);

    $rss = new SimpleXmlElement($content);

    $count = 0;
    $blogData = array();
    foreach($rss->channel->item as $item) {
        $blogData[$count]['pubDate'] = date('d/m/Y H:i',strtotime($item->pubDate));
        $blogData[$count]['title'] =  (string)$item->title;
        $blogData[$count]['link'] =  (string)$item->link;
        $blogData[$count]['description'] = mb_substr((string)$item->description ,5, 130); // o mb_substr e os valores 5(de onde começa) e 130(numero de caracteres exibidos) são para definir quantos caracteres do description foi utilizado
        $blogData[$count]['category'] = (string)$item->category;
        if (++$count == $numberOfPosts) break;
    }
?>




 <div id="box-feed">
    <div class="titulo-feed">
        <h1>Últimas Notícias</h1>
    </div>
    <div class="container-feed">    
        <?php   
            foreach ($blogData as $itemblogdata) {
               // if($itemblogdata['category'] == 'WorkGroup'){
                    
                
        ?>     
        <div class="content-feed">
            <p><a href="<?php echo $itemblogdata['link']; ?>" target="_blank"><?php echo $itemblogdata['description']; ?></a>    
            <a href="<?php echo $itemblogdata['link']; ?>" target="_blank"><?php echo $itemblogdata['title']; ?></a><br />          
            <span class="feed-data"><?php echo $itemblogdata['pubDate']; ?></span></p>     
        </div>
        <?php
        //}
            }
        ?>               
    </div>
    <div class="link_veja_mais">    
        <label class="texto_veja_mais"><a href="http://www.workmotor.com.br/blog/" target="_blank">VEJA MAIS >></a></label> 
    </div> 
</div>
