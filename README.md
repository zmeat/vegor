# This Is A Package For Php Pretty Console

# 环境依赖
    nodejs  php

# 安装
    composer require vegor/phpconsole
    sudo chmod 777 vendor/vegor/phpconsole/install.sh
    sudo bash vendor/vegor/phpconsole/install.sh



# usage

    use Vegor/Console;
    
    Console::log('test text');
    
    Console::warn('test text1', 'test text2', ...);
    
    $a = [ 'a' => [], 'b' => '1'];
    
    Console::info($a, $a, $a);

# 打开phpconsole查看调试信息

    shell> phpconsole
   
# 关闭使用Ctrl^C组合键

    注意:
        打开phpconsole 控制台查看时会占用本地端口3334
        多个项目同时使用时会将信息同事输出到同一个控制台
        控制台暂只支持打开一个



