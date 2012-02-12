## Codespy: A code coverage analyzing tool in pure php.

Code coverage analysis means finding out which lines in a source code are actually getting executed. This is important because when writing unit tests, one should know how much code the tests are covering.

Existing code coverage analyzing tools depends on xdebug functions to do the code coverage analysis. This is an attempt to accomplish the same without using xdebug.

**Usage:**

Codespy can work only with included files. So you will have to include the target source file in the test-cases file. So we will need a minimum of three files for using codespy which are,

**codespy.php** 

**simpleclass.php**  -> The source file to analyze.

**test_cases.php**   -> The file with testcases.

test_cases.php should look like,

    <?php
    //You can include any files that dont need to be analyzed here ie before including codespy.php file
    include 'codespy.php'; 
    // All the files included after this will be analyzed for code coverage.
    // function addFileToSpy($path) can be used to restrict this to a set of specific files only.
    include 'sampleclass.php';
    
    \codespy\Analyzer::$outputdir = 'g:\work\easyphp-5.3.6.1\www\crxml\output';
    // Output directory to which the analyzer writes its output if using html format. Must be script writable.
    
    \codespy\Analyzer::$outputformat = 'html';
    // Output format. 
    // Supported formats, html,vim,php and text
    // html : writes html files, one for each analyzed file that contain the sourcecode with executed lines highlighted in red. Output directory must be set using  \codespy\Analyzer::$outputdir.
    // vim :  outputs vim command for each of the files that can be used to highlight the executed lines in a vim window displaying the respective source file
    // php : outputs a 2 dimensional array in php format with lines executed for each of analyzed file.
    // text : outputs the executed lines for each analyzed file
    
    $t = new sampleClass;
    echo $t->factorial(5);
    //Codespys destructor will write output to stdout or files after the script terminates.



 
