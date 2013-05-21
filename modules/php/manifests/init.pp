class php {

    exec { 'add_repo':
        command => '/usr/bin/add-apt-repository ppa:ondrej/php5'
    }

    exec { 'update_repo':
        command => '/usr/bin/apt-get update',
        require => Exec['add_repo']
    }

    $packages = ['php5', 'php5-mcrypt', 'php-xml-parser', 'php5-xdebug', 'php5-mysql', 'php5-cli', 'php5-curl', 'php5-fpm', 'libssh2-1-dev', 'php-apc', 'php-pear']
    package { $packages:
        ensure => latest,
        require => Exec['update_repo'],
    }

   exec { 'php-pear-channel-update':
        command => '/usr/bin/pear channel-update pear.php.net',
        require => Package[php-pear],
    }

    exec { 'php-pear-upgrade-all':
        command => '/usr/bin/pear upgrade-all',
        require => Exec['php-pear-channel-update'],
    }

    exec { 'php-pear-discover-phpunit':
        command => '/usr/bin/pear channel-discover pear.phpunit.de',
        require => Exec['php-pear-upgrade-all'],
    }

    exec { 'php-pear-discover-symfony':
        command => '/usr/bin/pear channel-discover pear.symfony.com',
        require => Exec['php-pear-upgrade-all'],
    }

    exec { 'php-pear-discover-ez':
        command => '/usr/bin/pear channel-discover components.ez.no',
        require => Exec['php-pear-upgrade-all'],
    }

    exec { 'php-pear-install-phpunit':
        command => '/usr/bin/pear install phpunit/PHPUnit',
        require => Exec['php-pear-discover-phpunit', 'php-pear-discover-symfony', 'php-pear-discover-ez'],
    }

    file { 'php.ini':
        path => '/etc/php5/fpm/php.ini',
        ensure => file,
        owner => root,
        group => root,
        source => 'puppet:///modules/php/php.ini',
        require => Package['php5-fpm'],
    }
    
    service { 'apache2':
        ensure => stopped,
        enable => false,
    }
}