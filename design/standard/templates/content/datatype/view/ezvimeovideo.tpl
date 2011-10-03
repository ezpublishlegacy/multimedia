{def $im = concat('http://player.vimeo.com/video/', $attribute.content.id)}

<div class='playerwrap'>
<iframe id='playerframe' src="{$im}" width="682px" height="500px" frameborder="0"></iframe>
</div>