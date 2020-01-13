<?php $__env->startSection('content'); ?>
    <!-- Blog Posts Area -->
    <div class="col-12 col-lg-8">
        <div class="row">

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Single Blog Post -->
                <div class="col-12 col-lg-6">
                    <div class="single-blog-post style-3">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <a href="#"><img src="<?php echo e($post->image); ?>" alt=""></a>
                        </div>
                        <!-- Post Data -->
                        <div class="post-data">
                            <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/category/<?php echo e($category->id); ?>" class="post-catagory"><?php echo e($category->title); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <a href="#" class="post-title">
                                <h6><?php echo e($post->title); ?></h6>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="viral-news-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <?php if($posts->currentPage() == 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo e($posts->currentPage()); ?>">Previous</a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo e($posts->currentPage() - 1); ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for($i = 1; $i <= $counter; $i++): ?>
                            <li class="page-item"><a class="page-link" href="/?page=<?php echo e($i); ?>"><?php echo e($i); ?></a></li>
                            <?php endfor; ?>

                            <?php if($posts->currentPage() == $counter): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo e($posts->currentPage()); ?>">Next</a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo e($posts->currentPage() + 1); ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('hp-form'); ?>
    <?php echo $__env->make('blocks.registration-hp-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/phpproject/resources/views/index.blade.php ENDPATH**/ ?>