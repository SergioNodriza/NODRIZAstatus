<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerAU6Gmck\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerAU6Gmck/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerAU6Gmck.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerAU6Gmck\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerAU6Gmck\App_KernelDevDebugContainer([
    'container.build_hash' => 'AU6Gmck',
    'container.build_id' => '8f59656b',
    'container.build_time' => 1610016369,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerAU6Gmck');
