class tools {
    $packages = ['python-software-properties', 'curl', 'imagemagick']
    
    package { $packages:
        ensure => installed,
    }
}
