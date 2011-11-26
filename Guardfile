# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard 'phpunit', :cli => '--colors --verbose' do
  watch(%r{^tests/(.*)Test\.php$}) do |m|
    cmd = "phpunit --colors --verbose tests/#{m[1]}Test.php"
    puts "Execute: #{cmd}"
    `#{cmd}`
  end
end
