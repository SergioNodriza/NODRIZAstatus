<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container6Rt1ZFO\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container6Rt1ZFO/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container6Rt1ZFO.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container6Rt1ZFO\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container6Rt1ZFO\App_KernelDevDebugContainer([
    'container.build_hash' => '6Rt1ZFO',
    'container.build_id' => 'd97b12a7',
    'container.build_time' => 1609854294,
], __DIR__.\DIRECTORY_SEPARATOR.'Container6Rt1ZFO');
