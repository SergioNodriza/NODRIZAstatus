<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerPAANHAe\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerPAANHAe/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerPAANHAe.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerPAANHAe\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerPAANHAe\App_KernelDevDebugContainer([
    'container.build_hash' => 'PAANHAe',
    'container.build_id' => '138f394b',
    'container.build_time' => 1610610983,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerPAANHAe');
