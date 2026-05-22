<?php
    $video = \App\Models\HomeVideo::current();
?>

<?php if($video): ?>
    <div class="video-block">
        <iframe src="<?php echo e($video->embedUrl()); ?>"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen
            loading="lazy"
            style="width:100%;aspect-ratio:16/9;border:0;border-radius:8px;">
        </iframe>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Parallaxnet ID\resources\views/components/home-video.blade.php ENDPATH**/ ?>