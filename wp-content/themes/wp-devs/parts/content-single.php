   <!-- pegando o id de cada post de forma dinânimca -->
   <article id="post-<?php the_ID() ?>" <?php post_class() ?>>

       <header>
           <h1><?php the_title() ?></h1>

           <div class="meta-info">
               <!-- no get precisa do echo antes -->
               <p><?php esc_html_e('Posted in', 'wp-devs') ?> <?php echo esc_html(get_the_date()) ?> by <?php the_author_posts_link() ?></p>

               <?php if (has_category()) : ?>
                   <p><?php esc_html_e('Categories', 'wp-devs') ?>: <?php the_category(' ',) ?></p>
               <?php endif ?>

               <?php if (has_tag()) : ?>
                   <p><?php esc_html_e('Tags', 'wp-devs') ?>: <?php the_tags('', ',   ') ?></p>
               <?php endif ?>
           </div>
       </header>
       <!-- pegando o conteúdo do post em si -->
       <?php the_content() ?>
       <!-- paginação quebra de página do post em si -->
       <?php wp_link_pages(array(
            'separator'        => ' | ',
        )) ?>
   </article>