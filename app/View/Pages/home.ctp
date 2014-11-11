<html>
    <head>
        <style type="text/css">
           
            #box-feed {
                width:300px; 
                margin:5px 0 5px 0;
                border: 2px solid #dddddd; 
                border-radius: 5px; 
                float: right;
                position: relative;
            }
            
            #box-feed .titulo-feed{
                border-bottom: 2px solid #dddddd;  
                background-color: #f1f1f1;                     
            }
            #box-feed .titulo-feed h1 {
                font-size: 18px;
                font-weight: bold;
                color: #145da9; 
                margin-top: 0px;   
                padding-top: 10px;
                padding-left: 10px;              
            }
            
            #box-feed .container-feed {
                padding-left: 10px;  
                padding-top: 5px;
                width: 250px;                
                text-align: justify;
            }    
                                                                                
            #box-feed .feed-data {
                font-size: 14px;
                color:#858585;
                text-align: right;
            }
            #box-feed img {
                width:50px;
                height:50px;
                float:left;
                margin:5px 5px 7px 0;
                display: block;
            }
            
            #box-feed .link_veja_mais{
                border-top: 2px solid #dddddd;                    
                background-color: #f1f1f1;   
                width: 100%;
                height: 40px;                
            }
            #box-feed .link_veja_mais .texto_veja_mais {
                font-size: 14px;
                font-weight: bold;
                color: #145da9; 
                margin-left: 10px;
                margin-top: 10px;
            }
            
            #box-feed .link_veja_mais .texto_veja_mais a{
                color: #145da9;                 
            }
          
            
        </style>
    </head>
 <body>
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
            ?>     
            <div class="content-feed">
                <p><a href="<?php echo $itemblogdata['link']; ?>" target="_blank"><?php echo $itemblogdata['description']; ?></a>    
                <a href="<?php echo $itemblogdata['link']; ?>" target="_blank"><?php echo $itemblogdata['title']; ?></a><br />          
                <span class="feed-data"><?php echo $itemblogdata['pubDate']; ?></span></p>     
            </div>
            <?php
                }
            ?>               
        </div>
        <div class="link_veja_mais">    
            <label class="texto_veja_mais"><a href="">VEJA MAIS >></a></label> 
        </div> 
    </div>
</body>
</html>