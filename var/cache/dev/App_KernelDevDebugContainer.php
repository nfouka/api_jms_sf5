<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerR8GxGfT\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerR8GxGfT/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerR8GxGfT.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerR8GxGfT\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerR8GxGfT\App_KernelDevDebugContainer([
    'container.build_hash' => 'R8GxGfT',
    'container.build_id' => '47cc6abc',
    'container.build_time' => 1606292649,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerR8GxGfT');