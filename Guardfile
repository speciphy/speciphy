# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard 'phpunit', :tests_path => 'tests', :cli => '--colors --verbose' do
  watch(%r{src/(.*)\.php$}) {|m| "tests/#{m[1].sub(%r{Speciphy/}, 'Speciphy/Tests/')}Test.php" }
  watch(%r{^tests/(.*)Test\.php$}) {|m| "tests/#{m[1]}Test.php" }
end
