

<div id="content-texto-home">
    <h1>A WorkGroup</h1>
    <div class="content-texto-workgroup">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vehicula 
           laoreet condimentum. Donec rutrum dictum aliquet. Donec ac est id sapien 
           tempus venenatis. Morbi lorem arcu, vulputate dapibus nunc nec, pretium 
           consequat sem. Integer vitae feugiat metus. Duis nec purus velit. Mauris
           orci sapien, imperdiet quis arcu eu, egestas maximus quam. Etiam congue, 
           diam at pretium condimentum, quam elit malesuada velit, et convallis justo 
           nisl ac risus.</p>
        <p>Sed non sapien quam. Nam molestie sodales elit, id fringilla ipsum dignissim a.
           Sed purus quam, luctus sed aliquet at, blandit malesuada dui. Donec auctor nisi 
           turpis. Donec luctus tortor nec urna viverra convallis. Vestibulum condimentum 
           ipsum at facilisis vulputate. In ut interdum odio. Suspendisse dictum metus et 
           risus elementum faucibus. Suspendisse eu rhoncus nunc, nec consectetur ipsum.</p>
    </div>    
</div> 
<div id="depoimentos">
    <div class="autor-depoimento">
        <p>Autor</p>
    </div>
    <div class="content-depoimento">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
           Aenean vehicula laoreet condimentum. Donec rutrum dictum aliquet. 
           Donec ac est id sapien tempus venenatis.</p>
    </div>    
</div> 

<?php

    $numberOfPosts = 3;
    $feedUrl = 'http://www.workmotor.com.br/blog/category/workgroup/feed/';

    $content = file_get_contents($feedUrl);

    $rss = new SimpleXmlElement($content);

    $count = 0;
    $blogData = array();
    foreach($rss->channel->item as $item) {
        $dia = date('d',strtotime($item->pubDate));
        $mes = date('m',strtotime($item->pubDate));
        $ano = date('Y',strtotime($item->pubDate));
        
        switch ($mes){
            case "01" : 
                $nomemes = "Janeiro";
                break;
            case "02" :
                $nomemes = "Fevereiro";
                break;
            case "03": 
                $nomemes = "Março";
                break;
            case "04": 
                $nomemes = "Abril";
                break;
            case "05":
                $nomemes = "Maio";
                break;
            case "06": 
                $nomemes = "Junho";
                break;
            case "07":
                $nomemes = "Julho";
                break;
            case "08": 
                $nomemes = "Agosto";
                break;
            case "09": 
                $nomemes = "Setembro";
                break;
            case "10":
                $nomemes = "Outubro";
                break;
            case "11":
                $nomemes = "Novembro";
                break;
            case "12":
                $nomemes = "Dezembro";
                break;
        }        
        
        $blogData[$count]['pubDate'] = $dia.' de '.$nomemes.' de '.$ano;
        $blogData[$count]['title'] =  (string)$item->title;
        $blogData[$count]['link'] =  (string)$item->link;
        $blogData[$count]['description'] = mb_substr((string)$item->description ,5, 130); // o mb_substr e os valores 5(de onde começa) e 130(numero de caracteres exibidos) são para definir quantos caracteres do description foi utilizado        
        if (++$count == $numberOfPosts) break;
    }

?>

 <div id="box-feed">
    <div class="titulo-feed">
        <h1>Últimas Notícias</h1>
    </div>
    <div class="container-feed">    
        <?php   
            $contador = 1;
            foreach ($blogData as $itemblogdata) {     

        ?>     
        <div class="content-feed <?php echo ($contador%2 == 0) ? 'content-feed-bg' : ''; ?>">
            <p class='content-feed-p'><a href="<?php echo $itemblogdata['link']; ?>" target="_blank"><?php echo $itemblogdata['description']; ?></a>    
            <a href="<?php echo $itemblogdata['link']; ?>" target="_blank"><?php echo $itemblogdata['title']; ?></a><br />          
            <span class="feed-data"><?php echo $itemblogdata['pubDate']; ?></span></p>     
        </div>
        <?php                          
                $contador++;                   
            }            
        ?>               
    </div>
    <div class="link_veja_mais">    
        <label class="texto_veja_mais"><a href="http://www.workmotor.com.br/blog/" target="_blank">VEJA MAIS >></a></label> 
    </div> 
</div>
