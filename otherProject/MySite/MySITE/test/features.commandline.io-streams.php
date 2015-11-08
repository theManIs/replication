<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <title>PHP: Использование - Manual </title>

 <link rel="shortcut icon" href="https://php.net/favicon.ico">
 <link rel="search" type="application/opensearchdescription+xml" href="http://php.net/phpnetimprovedsearch.src" title="Add PHP.net search">
 <link rel="alternate" type="application/atom+xml" href="https://php.net/releases/feed.php" title="PHP Release feed">
 <link rel="alternate" type="application/atom+xml" href="https://php.net/feed.atom" title="PHP: Hypertext Preprocessor">

 <link rel="canonical" href="http://php.net/manual/ru/features.commandline.usage.php">
 <link rel="shorturl" href="http://php.net/commandline.usage">
 <link rel="alternate" href="http://php.net/commandline.usage" hreflang="x-default">

 <link rel="contents" href="https://php.net/manual/ru/index.php">
 <link rel="index" href="https://php.net/manual/ru/features.commandline.php">
 <link rel="prev" href="https://php.net/manual/ru/features.commandline.options.php">
 <link rel="next" href="https://php.net/manual/ru/features.commandline.io-streams.php">

 <link rel="alternate" href="https://php.net/manual/en/features.commandline.usage.php" hreflang="en">
 <link rel="alternate" href="https://php.net/manual/pt_BR/features.commandline.usage.php" hreflang="pt_BR">
 <link rel="alternate" href="https://php.net/manual/zh/features.commandline.usage.php" hreflang="zh">
 <link rel="alternate" href="https://php.net/manual/fr/features.commandline.usage.php" hreflang="fr">
 <link rel="alternate" href="https://php.net/manual/de/features.commandline.usage.php" hreflang="de">
 <link rel="alternate" href="https://php.net/manual/ja/features.commandline.usage.php" hreflang="ja">
 <link rel="alternate" href="https://php.net/manual/kr/features.commandline.usage.php" hreflang="kr">
 <link rel="alternate" href="https://php.net/manual/ro/features.commandline.usage.php" hreflang="ro">
 <link rel="alternate" href="https://php.net/manual/ru/features.commandline.usage.php" hreflang="ru">
 <link rel="alternate" href="https://php.net/manual/es/features.commandline.usage.php" hreflang="es">
 <link rel="alternate" href="https://php.net/manual/tr/features.commandline.usage.php" hreflang="tr">

<link rel="stylesheet" type="text/css" href="https://php.net/cached.php?t=1421837618&amp;f=/fonts/Fira/fira.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://php.net/cached.php?t=1421837618&amp;f=/fonts/Font-Awesome/css/fontello.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://php.net/cached.php?t=1429291204&amp;f=/styles/theme-base.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://php.net/cached.php?t=1429259403&amp;f=/styles/theme-medium.css" media="screen">

 <!--[if lte IE 7]>
 <link rel="stylesheet" type="text/css" href="https://php.net/styles/workarounds.ie7.css" media="screen">
 <![endif]-->

 <!--[if lte IE 8]>
 <script type="text/javascript">
  window.brokenIE = true;
 </script>
 <![endif]-->

 <!--[if lte IE 9]>
 <link rel="stylesheet" type="text/css" href="https://php.net/styles/workarounds.ie9.css" media="screen">
 <![endif]-->

 <!--[if IE]>
 <script type="text/javascript" src="https://php.net/js/ext/html5.js"></script>
 <![endif]-->

 <base href="https://php.net/manual/ru/features.commandline.usage.php">

</head>
<body class="docs ">

<nav id="head-nav" class="navbar navbar-fixed-top">
  <div class="navbar-inner clearfix">
    <a href="/" class="brand"><img src="/images/logo.php" width="48" height="24" alt="php"></a>
    <div id="mainmenu-toggle-overlay"></div>
    <input type="checkbox" id="mainmenu-toggle">
    <ul class="nav">
      <li class=""><a href="/downloads">Downloads</a></li>
      <li class="active"><a href="/docs.php">Documentation</a></li>
      <li class=""><a href="/get-involved" >Get Involved</a></li>
      <li class=""><a href="/support">Help</a></li>
    </ul>
    <form class="navbar-search" id="topsearch" action="/search.php">
      <input type="hidden" name="show" value="quickref">
      <input type="search" name="pattern" class="search-query" placeholder="Search" accesskey="s">
    </form>
  </div>
  <div id="flash-message"></div>
</nav>
<div class="headsup"><a href='/index.php#id2015-07-10-4'>PHP 7.0.0 Beta 1 Released</a></div>
<nav id="trick"><div><dl>
<dt><a href='/manual/en/getting-started.php'>Getting Started</a></dt>
	<dd><a href='/manual/en/introduction.php'>Introduction</a></dd>
	<dd><a href='/manual/en/tutorial.php'>A simple tutorial</a></dd>
<dt><a href='/manual/en/langref.php'>Language Reference</a></dt>
	<dd><a href='/manual/en/language.basic-syntax.php'>Basic syntax</a></dd>
	<dd><a href='/manual/en/language.types.php'>Types</a></dd>
	<dd><a href='/manual/en/language.variables.php'>Variables</a></dd>
	<dd><a href='/manual/en/language.constants.php'>Constants</a></dd>
	<dd><a href='/manual/en/language.expressions.php'>Expressions</a></dd>
	<dd><a href='/manual/en/language.operators.php'>Operators</a></dd>
	<dd><a href='/manual/en/language.control-structures.php'>Control Structures</a></dd>
	<dd><a href='/manual/en/language.functions.php'>Functions</a></dd>
	<dd><a href='/manual/en/language.oop5.php'>Classes and Objects</a></dd>
	<dd><a href='/manual/en/language.namespaces.php'>Namespaces</a></dd>
	<dd><a href='/manual/en/language.exceptions.php'>Exceptions</a></dd>
	<dd><a href='/manual/en/language.generators.php'>Generators</a></dd>
	<dd><a href='/manual/en/language.references.php'>References Explained</a></dd>
	<dd><a href='/manual/en/reserved.variables.php'>Predefined Variables</a></dd>
	<dd><a href='/manual/en/reserved.exceptions.php'>Predefined Exceptions</a></dd>
	<dd><a href='/manual/en/reserved.interfaces.php'>Predefined Interfaces and Classes</a></dd>
	<dd><a href='/manual/en/context.php'>Context options and parameters</a></dd>
	<dd><a href='/manual/en/wrappers.php'>Supported Protocols and Wrappers</a></dd>
</dl>
<dl>
<dt><a href='/manual/en/security.php'>Security</a></dt>
	<dd><a href='/manual/en/security.intro.php'>Introduction</a></dd>
	<dd><a href='/manual/en/security.general.php'>General considerations</a></dd>
	<dd><a href='/manual/en/security.cgi-bin.php'>Installed as CGI binary</a></dd>
	<dd><a href='/manual/en/security.apache.php'>Installed as an Apache module</a></dd>
	<dd><a href='/manual/en/security.filesystem.php'>Filesystem Security</a></dd>
	<dd><a href='/manual/en/security.database.php'>Database Security</a></dd>
	<dd><a href='/manual/en/security.errors.php'>Error Reporting</a></dd>
	<dd><a href='/manual/en/security.globals.php'>Using Register Globals</a></dd>
	<dd><a href='/manual/en/security.variables.php'>User Submitted Data</a></dd>
	<dd><a href='/manual/en/security.magicquotes.php'>Magic Quotes</a></dd>
	<dd><a href='/manual/en/security.hiding.php'>Hiding PHP</a></dd>
	<dd><a href='/manual/en/security.current.php'>Keeping Current</a></dd>
<dt><a href='/manual/en/features.php'>Features</a></dt>
	<dd><a href='/manual/en/features.http-auth.php'>HTTP authentication with PHP</a></dd>
	<dd><a href='/manual/en/features.cookies.php'>Cookies</a></dd>
	<dd><a href='/manual/en/features.sessions.php'>Sessions</a></dd>
	<dd><a href='/manual/en/features.xforms.php'>Dealing with XForms</a></dd>
	<dd><a href='/manual/en/features.file-upload.php'>Handling file uploads</a></dd>
	<dd><a href='/manual/en/features.remote-files.php'>Using remote files</a></dd>
	<dd><a href='/manual/en/features.connection-handling.php'>Connection handling</a></dd>
	<dd><a href='/manual/en/features.persistent-connections.php'>Persistent Database Connections</a></dd>
	<dd><a href='/manual/en/features.safe-mode.php'>Safe Mode</a></dd>
	<dd><a href='/manual/en/features.commandline.php'>Command line usage</a></dd>
	<dd><a href='/manual/en/features.gc.php'>Garbage Collection</a></dd>
	<dd><a href='/manual/en/features.dtrace.php'>DTrace Dynamic Tracing</a></dd>
</dl>
<dl>
<dt><a href='/manual/en/funcref.php'>Function Reference</a></dt>
	<dd><a href='/manual/en/refs.basic.php.php'>Affecting PHP's Behaviour</a></dd>
	<dd><a href='/manual/en/refs.utilspec.audio.php'>Audio Formats Manipulation</a></dd>
	<dd><a href='/manual/en/refs.remote.auth.php'>Authentication Services</a></dd>
	<dd><a href='/manual/en/refs.utilspec.cmdline.php'>Command Line Specific Extensions</a></dd>
	<dd><a href='/manual/en/refs.compression.php'>Compression and Archive Extensions</a></dd>
	<dd><a href='/manual/en/refs.creditcard.php'>Credit Card Processing</a></dd>
	<dd><a href='/manual/en/refs.crypto.php'>Cryptography Extensions</a></dd>
	<dd><a href='/manual/en/refs.database.php'>Database Extensions</a></dd>
	<dd><a href='/manual/en/refs.calendar.php'>Date and Time Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.fileprocess.file.php'>File System Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.international.php'>Human Language and Character Encoding Support</a></dd>
	<dd><a href='/manual/en/refs.utilspec.image.php'>Image Processing and Generation</a></dd>
	<dd><a href='/manual/en/refs.remote.mail.php'>Mail Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.math.php'>Mathematical Extensions</a></dd>
	<dd><a href='/manual/en/refs.utilspec.nontext.php'>Non-Text MIME Output</a></dd>
	<dd><a href='/manual/en/refs.fileprocess.process.php'>Process Control Extensions</a></dd>
	<dd><a href='/manual/en/refs.basic.other.php'>Other Basic Extensions</a></dd>
	<dd><a href='/manual/en/refs.remote.other.php'>Other Services</a></dd>
	<dd><a href='/manual/en/refs.search.php'>Search Engine Extensions</a></dd>
	<dd><a href='/manual/en/refs.utilspec.server.php'>Server Specific Extensions</a></dd>
	<dd><a href='/manual/en/refs.basic.session.php'>Session Extensions</a></dd>
	<dd><a href='/manual/en/refs.basic.text.php'>Text Processing</a></dd>
	<dd><a href='/manual/en/refs.basic.vartype.php'>Variable and Type Related Extensions</a></dd>
	<dd><a href='/manual/en/refs.webservice.php'>Web Services</a></dd>
	<dd><a href='/manual/en/refs.utilspec.windows.php'>Windows Only Extensions</a></dd>
	<dd><a href='/manual/en/refs.xml.php'>XML Manipulation</a></dd>
</dl>
<dl>
<dt>Keyboard Shortcuts</dt><dt>?</dt>
<dd>This help</dd>
<dt>j</dt>
<dd>Next menu item</dd>
<dt>k</dt>
<dd>Previous menu item</dd>
<dt>g p</dt>
<dd>Previous man page</dd>
<dt>g n</dt>
<dd>Next man page</dd>
<dt>G</dt>
<dd>Scroll to bottom</dd>
<dt>g g</dt>
<dd>Scroll to top</dd>
<dt>g h</dt>
<dd>Goto homepage</dd>
<dt>g s</dt>
<dd>Goto search<br>(current page)</dd>
<dt>/</dt>
<dd>Focus search box</dd>
</dl></div></nav>
<div id="goto">
    <div class="search">
         <div class="text"></div>
         <div class="results"><ul></ul></div>
   </div>
</div>

  <div id="breadcrumbs" class="clearfix">
    <div id="breadcrumbs-inner">
          <div class="next">
        <a href="features.commandline.io-streams.php">
          Потоки ввода/вывода &raquo;
        </a>
      </div>
              <div class="prev">
        <a href="features.commandline.options.php">
          &laquo; Опции        </a>
      </div>
          <ul>
            <li><a href='index.php'>Руководство по PHP</a></li>      <li><a href='features.php'>Отличительные особенности</a></li>      <li><a href='features.commandline.php'>Использование PHP в командной строке</a></li>      </ul>
    </div>
  </div>




<div id="layout" class="clearfix">
  <section id="layout-content">
  <div class="page-tools">
    <div class="change-language">
      <form action="/manual/change.php" method="get" id="changelang" name="changelang">
        <fieldset>
          <label for="changelang-langs">Change language:</label>
          <select onchange="document.changelang.submit()" name="page" id="changelang-langs">
            <option value='en/features.commandline.usage.php'>English</option>
            <option value='pt_BR/features.commandline.usage.php'>Brazilian Portuguese</option>
            <option value='zh/features.commandline.usage.php'>Chinese (Simplified)</option>
            <option value='fr/features.commandline.usage.php'>French</option>
            <option value='de/features.commandline.usage.php'>German</option>
            <option value='ja/features.commandline.usage.php'>Japanese</option>
            <option value='kr/features.commandline.usage.php'>Korean</option>
            <option value='ro/features.commandline.usage.php'>Romanian</option>
            <option value='ru/features.commandline.usage.php' selected="selected">Russian</option>
            <option value='es/features.commandline.usage.php'>Spanish</option>
            <option value='tr/features.commandline.usage.php'>Turkish</option>
            <option value="help-translate.php">Other</option>
          </select>
        </fieldset>
      </form>
    </div>
    <div class="edit-bug">
      <a href="https://edit.php.net/?project=PHP&amp;perm=ru/features.commandline.usage.php">Edit</a>
      <a href="https://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=features.commandline.usage">Report a Bug</a>
    </div>
  </div><div id="features.commandline.usage" class="section">
  <h2 class="title">Выполнение PHP-файлов</h2>
  

  <p class="para">
   В <acronym title="Command Line Interpreter/Interface">CLI</acronym> <acronym title="Server Application Programming Interface">SAPI</acronym> есть три различных способа  запуска PHP-кода:
   <ol type="1">
    <li class="listitem">
     <p class="para">
      Указывание конкретного файла для запуска.
     </p>
     <div class="informalexample">
      <div class="example-contents screen">
<div class="cdata"><pre>
$ php my_script.php

$ php -f my_script.php
</pre></div>
      </div>
     </div>
     <p class="para">
      Оба способа (с указыванием опции <strong class="option unknown">-f</strong>
 или без) запустят
      файл <var class="filename">my_script.php</var>. Нет ограничений, какой
      файл запускать, и PHP-скрипты не обязаны иметь
      расширение <em>.php</em>.
     </p>
     <blockquote class="note"><p><strong class="note">Замечание</strong>: 
      <p class="para">
       Если необходимо передать аргументы в скрипт,
       то при использовании опции <strong class="option unknown">-f</strong>

       первым аргументом должен быть <em>--</em> .
      </p>
     </p></blockquote>
    </li>
    <li class="listitem">
     <p class="para">
      Передать PHP-код напрямую в командной строке.
     </p>
     <div class="informalexample">
      <div class="example-contents screen">
<div class="cdata"><pre>
$ php -r &#039;print_r(get_defined_constants());&#039;
</pre></div>
      </div>
     </div>
     <p class="para">
      Необходимо быть особо осторожным при использовании этого способа,
      так как может произойти подстановка переменных оболочки при использовании
      двойных кавычек.
     </p>
     <blockquote class="note"><p><strong class="note">Замечание</strong>: 
      <p class="para">
       Внимательно прочтите пример: в нем нет открывающих и закрывающих тегов!
       Опция <strong class="option unknown">-r</strong>
 просто в них не нуждается. Их использование
       приведет к ошибке парсера.
      </p>
     </p></blockquote>
    </li>
    <li class="listitem">
     <p class="para">
      Передать запускаемый PHP-код через стандартный поток ввода
      (<em>stdin</em>).
     </p>
     <p class="para">
      Это дает мощную возможность создавать PHP-код и
      скармливать его запускаемому файлу, как показано в этом
      (вымышленном) примере:
     </p>
     <div class="informalexample">
      <div class="example-contents screen">
<div class="cdata"><pre>
$ some_application | some_filter | php | sort -u &gt; final_output.txt
</pre></div>
      </div>
     </div>
    </li>
   </ol>
   Вы не можете комбинировать любой из этих трех способов запуска кода.
  </p>
  
  <p class="para">
   Как и любое другое консольное приложение, бинарный файл PHP
   принимает аргументы, но PHP-скрипт также может получать
   аргументы. PHP не ограничивает количество аргументов,
   передаваемых в скрипт (оболочка консоли устанавливает
   некоторый порог количества символов, которые могут быть переданы;
   обычно этого лимита хватает). Переданные аргументы доступны
   в глобальном массиве <var class="varname"><var class="varname"><a href="reserved.variables.argv.php" class="classname">$argv</a></var></var>. Первый индекс
   (ноль) всегда содержит имя вызываемого скрипта из командной
   строки. Учтите, что если код вызывается на лету из командной
   строки с помощью опции <strong class="option unknown">-r</strong>
, значением
   <var class="varname"><var class="varname"><a href="reserved.variables.argv.php" class="classname">$argv[0]</a></var></var> будет просто дефис
   (<em>-</em>). То же самое верно и для кода,
   переданного через конвейер из <em>STDIN</em>.
  </p>

  <p class="para">
   Вторая зарегистрированная глобальная переменная - это
   <var class="varname"><var class="varname"><a href="reserved.variables.argc.php" class="classname">$argc</a></var></var>, содержащая количество элементов
   в массиве <var class="varname"><var class="varname"><a href="reserved.variables.argv.php" class="classname">$argv</a></var></var> (
   (а <em class="emphasis">не</em> количество аргументов,
   переданных скрипту).
  </p>
  
  <p class="para">
   Если передаваемые аргументы не начинаются с символа
   <em>-</em>, то особых проблем быть не должно.
   Передаваемый в скрипт аргумент, который начинается с <em>-</em>
   создаст проблемы, так как PHP решит, что он сам должен его
   обработать. Для предотвращения подобного поведения
   используйте разделитель списка аргументов <em>--</em>.
   После того как этот разделитель будет прочитан PHP, все последующие
   аргументы будут переданы в скрипт нетронутыми.
  </p>
  
  <div class="informalexample">
   <div class="example-contents screen">
<div class="cdata"><pre>
# Эта команда не запустит данный код, но покажет информацию об использовании PHP
$ php -r &#039;var_dump($argv);&#039; -h
Usage: php [options] [-f] &lt;file&gt; [args...]
[...]

# Эта команда передаст аргумент &#039;-h&#039; в скрипт, предотвратив показ справки PHP
$ php -r &#039;var_dump($argv);&#039; -- -h
array(2) {
  [0]=&gt;
  string(1) &quot;-&quot;
  [1]=&gt;
  string(2) &quot;-h&quot;
}
</pre></div>
   </div>
  </div>
  
  <p class="para">
   Однако, в Unix-системах есть еще один способ использования
   PHP для консольных скриптов. Можно написать скрипт,
   первая строка которого будет начинаться с
   <em>#!/usr/bin/php</em> (или же другой
   корректный путь к бинарному файлу PHP <acronym title="Command Line Interpreter/Interface">CLI</acronym>).
   После этой строки можно поместить обычный PHP-код, заключенный
   в открывающие и закрывающие теги PHP. Как только будут установлены
   корректные атрибуты запуска на файл (например,
   <strong class="command">chmod +x test</strong>), скрипт может быть
   запущен как обычный консольный или perl-скрипт:
  </p>
  
  <div class="example" id="example-395">
   <p><strong>Пример #1 Запуск PHP-скрипта как консольного</strong></p>
   <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
#!/usr/bin/php<br /><span style="color: #0000BB">&lt;?php<br />var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$argv</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
   </div>

   <div class="example-contents"><p>
     Подразумевая что этот файл называется <var class="filename">test</var>
     и находится в текущей директории, можно сделать следующее:
   </p></div>
   <div class="example-contents screen">
<div class="cdata"><pre>
$ chmod +x test
$ ./test -h -- foo
array(4) {
  [0]=&gt;
  string(6) &quot;./test&quot;
  [1]=&gt;
  string(2) &quot;-h&quot;
  [2]=&gt;
  string(2) &quot;--&quot;
  [3]=&gt;
  string(3) &quot;foo&quot;
}
</pre></div>
   </div>
  </div>
  
  <p class="para">
   Как можно увидеть, в этом случае не нужно заботиться о
   передаче параметров, которые начинаются с <em>-</em>.
  </p>
  
  <p class="para">
   Исполняемый PHP-файл может использоваться для запуска PHP-скриптов
   независимо от веб-сервера. В случае, работы в Unix-подобной системе,
   необходимо добавить ко всем скриптам особую строку
   <em>#!</em> (называемую также &quot;shebang&quot;) в начало файла
   и сделать их исполняемыми, чтобы указать, какая из программ должна
   обрабатывать эти скрипты. На Windows-платформах можно
   назначить обработчик <var class="filename">php.exe</var> для файлов
   с расширениями <em>.php</em> либо создать пакетный
   (.bat) файл для запуска скриптов посредством PHP.
   Строка, добавляемая в начале скрипта для Unix-систем,
   не влияет на их работу в ОС Windows, таким образом можно
   создавать кроссплатформенные скрипты. Ниже приведен простой
   пример скрипта, выполняемого из командной строки:
  </p>
  
  <p class="para">
   <div class="example" id="example-396">
    <p><strong>Пример #2 Скрипт, предназначенный для запуска из командной строки (script.php)</strong></p>
    <div class="example-contents">
<div class="phpcode"><code><span style="color: #000000">
#!/usr/bin/php<br /><span style="color: #0000BB">&lt;?php<br /><br /></span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$argc&nbsp;</span><span style="color: #007700">!=&nbsp;</span><span style="color: #0000BB">2&nbsp;</span><span style="color: #007700">||&nbsp;</span><span style="color: #0000BB">in_array</span><span style="color: #007700">(</span><span style="color: #0000BB">$argv</span><span style="color: #007700">[</span><span style="color: #0000BB">1</span><span style="color: #007700">],&nbsp;array(</span><span style="color: #DD0000">'--help'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'-help'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'-h'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'-?'</span><span style="color: #007700">)))&nbsp;{<br /></span><span style="color: #0000BB">?&gt;<br /></span><br />Это&nbsp;консольный&nbsp;PHP-скрипт,&nbsp;принимающий&nbsp;один&nbsp;аргумент.<br /><br />&nbsp;&nbsp;Использование:<br />&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$argv</span><span style="color: #007700">[</span><span style="color: #0000BB">0</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>&nbsp;&lt;option&gt;<br /><br />&nbsp;&nbsp;&lt;option&gt;&nbsp;Любое&nbsp;слово,&nbsp;которое&nbsp;вы&nbsp;хотели&nbsp;бы<br />&nbsp;&nbsp;напечатать.&nbsp;Опции&nbsp;&nbsp;--help,&nbsp;-help,&nbsp;-h,<br />&nbsp;&nbsp;или&nbsp;-?&nbsp;покажут&nbsp;текущую&nbsp;справочную&nbsp;информацию.<br /><br /><span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">$argv</span><span style="color: #007700">[</span><span style="color: #0000BB">1</span><span style="color: #007700">];<br />}<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></div>
    </div>

   </div>
  </p>
  
  <p class="para">
   Скрипт приведенный выше включается в себя специальную Unix строку,
   указывающую на его запуск с помощью PHP. Работа ведется с <acronym title="Command Line Interpreter/Interface">CLI</acronym>-версией,
   поэтому не будет выведено ни одного <acronym title="Hypertext Transfer Protocol">HTTP</acronym>-заголовка.
  </p>
  
  <p class="para">
   Также приведенный пример проверяет количество переданных аргументов.
   В случае, если их больше или меньше одного, а также в случае, если переданный
   аргумент был <strong class="option unknown">--help</strong>
, <strong class="option unknown">-help</strong>
,
   <strong class="option unknown">-h</strong>
 или <strong class="option unknown">-?</strong>
, выводится
   справочное сообщение с использованием <var class="varname"><var class="varname"><a href="reserved.variables.argv.php" class="classname">$argv[0]</a></var></var>, которое содержит
   имя выполняемого скрипта. В противном случае просто выводится полученный аргумент.
  </p>
  
  <p class="para">
   Для запуска приведенного примера в Unix-системе, необходимо сделать
   его исполняемым и просто выполнить в консоли
   <strong class="command">script.php echothis</strong> или
   <strong class="command">script.php -h</strong>. В Windows-системе можно
   создать пакетный файл:
  </p>
  
  <p class="para">
   <div class="example" id="example-397">
    <p><strong>Пример #3 Пакетный файл для запуска PHP-скрипта из командной строки (script.bat)</strong></p>
    <div class="example-contents">
<div class="shellcode"><pre class="shellcode">@echo OFF
&quot;C:\php\php.exe&quot; script.php %*</pre>
</div>
    </div>

   </div>
  </p>
  
  <p class="para">
   Предполагая, что скрипт называется
   <var class="filename">script.php</var> и полный путь к <acronym title="Command Line Interpreter/Interface">CLI</acronym>
   <var class="filename">php.exe</var> совпадает с
   <var class="filename">C:\php\php.exe</var>, приведенный пакетный файл
   запустит скрипт с переданными параметрами:
   <strong class="command">script.bat echothis</strong> либо
   <strong class="command">script.bat -h</strong>.
  </p>
  
  <p class="para">
   Также можно ознакомиться с расширением
   <a href="ref.readline.php" class="link">Readline</a>,
   которое можно использовать для усовершенствования
   консольного PHP-скрипта.
  </p>
  
  <p class="para">
   В Windows запуск PHP можно настроить без
   необходимости указывать <var class="filename">C:\php\php.exe</var> и
   расширение <em>.php</em>.
   Подробнее эта тема описана в разделе
   <a href="install.windows.commandline.php" class="link">Запуск PHP из
   командной строки в Microsoft Windows</a>.
  </p>
 </div>
<section id="usernotes">
 <div class="head">
  <span class="action"><a href="/manual/add-note.php?sect=features.commandline.usage&amp;redirect=https://php.net/manual/ru/features.commandline.usage.php"><img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12'> <small>add a note</small></a></span>
  <h3 class="title">User Contributed Notes <span class="count">4 notes</span></h3>
 </div><div id="allnotes">
  <div class="note" id="111816">  <div class="votes">
    <div id="Vu111816">
    <a href="/manual/vote-note.php?id=111816&amp;page=features.commandline.usage&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd111816">
    <a href="/manual/vote-note.php?id=111816&amp;page=features.commandline.usage&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V111816" title="82% like this...">
    18
    </div>
  </div>
  <a href="#111816" class="name">
  <strong class="user"><em>php at richardneill dot org</em></strong></a><a class="genanchor" href="#111816"> &para;</a><div class="date" title="2013-04-01 04:43"><strong>2 years ago</strong></div>
  <div class="text" id="Hcom111816">
<div class="phpcode"><code><span class="html">
On Linux, the shebang (#!) line is parsed by the kernel into at most two parts. <br />For example:<br /><br />1:&nbsp; #!/usr/bin/php<br />2:&nbsp; #!/usr/bin/env&nbsp; php<br />3:&nbsp; #!/usr/bin/php -n<br />4:&nbsp; #!/usr/bin/php -ddisplay_errors=E_ALL<br />5:&nbsp; #!/usr/bin/php -n -ddisplay_errors=E_ALL<br /><br />1. is the standard way to start a script. (compare "#!/bin/bash".)<br /><br />2. uses "env" to find where PHP is installed: it might be elsewhere in the $PATH, such as /usr/local/bin.<br /><br />3. if you don't need to use env, you can pass ONE parameter here. For example, to ignore the system's PHP.ini, and go with the defaults, use "-n". (See "man php".)<br /><br />4.&nbsp; or, you can set exactly one configuration variable. I recommend this one, because display_errors actually takes effect if it is set here. Otherwise, the only place you can enable it is system-wide in php.ini. If you try to use ini_set() in your script itself, it's too late: if your script has a parse error, it will silently die. <br /><br />5. This will not (as of 2013) work on Linux. It acts as if the whole string, "-n -ddisplay_errors=E_ALL" were a single argument. But in BSD, the shebang line can take more than 2 arguments, and so it may work as intended.<br /><br />Summary: use (2) for maximum portability, and (4) for maximum debugging.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="105433">  <div class="votes">
    <div id="Vu105433">
    <a href="/manual/vote-note.php?id=105433&amp;page=features.commandline.usage&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd105433">
    <a href="/manual/vote-note.php?id=105433&amp;page=features.commandline.usage&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V105433" title="69% like this...">
    9
    </div>
  </div>
  <a href="#105433" class="name">
  <strong class="user"><em>petruzanautico at yah00 dot com dot ar</em></strong></a><a class="genanchor" href="#105433"> &para;</a><div class="date" title="2011-08-17 01:06"><strong>3 years ago</strong></div>
  <div class="text" id="Hcom105433">
<div class="phpcode"><code><span class="html">
As you can't use -r and -f together, you can circumvent this by doing the following:<br />php -r '$foo = 678; include("your_script.php");'</span>
</code></div>
  </div>
 </div>
  <div class="note" id="105286">  <div class="votes">
    <div id="Vu105286">
    <a href="/manual/vote-note.php?id=105286&amp;page=features.commandline.usage&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd105286">
    <a href="/manual/vote-note.php?id=105286&amp;page=features.commandline.usage&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V105286" title="65% like this...">
    6
    </div>
  </div>
  <a href="#105286" class="name">
  <strong class="user"><em>spencer at aninternetpresence dot net</em></strong></a><a class="genanchor" href="#105286"> &para;</a><div class="date" title="2011-08-07 05:03"><strong>3 years ago</strong></div>
  <div class="text" id="Hcom105286">
<div class="phpcode"><code><span class="html">
If you are running the CLI on Windows and use the "-r" option, be sure to enclose your PHP code in double (not single) quotes. Otherwise, your code will not run.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="106221">  <div class="votes">
    <div id="Vu106221">
    <a href="/manual/vote-note.php?id=106221&amp;page=features.commandline.usage&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd106221">
    <a href="/manual/vote-note.php?id=106221&amp;page=features.commandline.usage&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V106221" title="40% like this...">
    -4
    </div>
  </div>
  <a href="#106221" class="name">
  <strong class="user"><em>andrew-by at hotmail dot com</em></strong></a><a class="genanchor" href="#106221"> &para;</a><div class="date" title="2011-10-19 09:59"><strong>3 years ago</strong></div>
  <div class="text" id="Hcom106221">
<div class="phpcode"><code><span class="html">
If you want your batch file's window stay opened after executing the PHP script just add "pause" at the last line. So it should look like:<br /><br />@echo OFF<br />"C:\php\php.exe" script.php %*<br />pause</span>
</code></div>
  </div>
 </div></div>

 <div class="foot"><a href="/manual/add-note.php?sect=features.commandline.usage&amp;redirect=https://php.net/manual/ru/features.commandline.usage.php"><img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12'> <small>add a note</small></a></div>
</section>    </section><!-- layout-content -->
        <aside class='layout-menu'>
    
        <ul class='parent-menu-list'>
                                    <li>
                <a href="features.commandline.php">Использование PHP в командной строке</a>
    
                                    <ul class='child-menu-list'>
    
                          
                        <li class="">
                            <a href="features.commandline.introduction.php" title="Введение">Введение</a>
                        </li>
                          
                        <li class="">
                            <a href="features.commandline.differences.php" title="Основные отличия от остальных реализаций SAPI">Основные отличия от остальных реализаций SAPI</a>
                        </li>
                          
                        <li class="">
                            <a href="features.commandline.options.php" title="Опции">Опции</a>
                        </li>
                          
                        <li class="current">
                            <a href="features.commandline.usage.php" title="Использование">Использование</a>
                        </li>
                          
                        <li class="">
                            <a href="features.commandline.io-streams.php" title="Потоки ввода/вывода">Потоки ввода/вывода</a>
                        </li>
                          
                        <li class="">
                            <a href="features.commandline.interactive.php" title="Интерактивная консоль">Интерактивная консоль</a>
                        </li>
                          
                        <li class="">
                            <a href="features.commandline.webserver.php" title="Встроенный web-&#8203;сервер">Встроенный web-&#8203;сервер</a>
                        </li>
                          
                        <li class="">
                            <a href="features.commandline.ini.php" title="Опции конфигурации">Опции конфигурации</a>
                        </li>
                            
                    </ul>
                    
            </li>
                        
                    </ul>
    </aside>


  </div><!-- layout -->
         
  <footer>
    <div class="container footer-content">
      <div class="row-fluid">
      <ul class="footmenu">
        <li><a href="/copyright.php">Copyright &copy; 2001-2015 The PHP Group</a></li>
        <li><a href="/my.php">My PHP.net</a></li>
        <li><a href="/contact.php">Contact</a></li>
        <li><a href="/sites.php">Other PHP.net sites</a></li>
        <li><a href="/mirrors.php">Mirror sites</a></li>
        <li><a href="/privacy.php">Privacy policy</a></li>
      </ul>
      </div>
    </div>
  </footer>

    
 <!-- External and third party libraries. -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://php.net/cached.php?t=1421837618&amp;f=/js/ext/modernizr.js"></script>
<script type="text/javascript" src="https://php.net/cached.php?t=1421837618&amp;f=/js/ext/hogan-2.0.0.min.js"></script>
<script type="text/javascript" src="https://php.net/cached.php?t=1421837618&amp;f=/js/ext/typeahead.min.js"></script>
<script type="text/javascript" src="https://php.net/cached.php?t=1421837618&amp;f=/js/ext/mousetrap.min.js"></script>
<script type="text/javascript" src="https://php.net/cached.php?t=1421837618&amp;f=/js/search.js"></script>
<script type="text/javascript" src="https://php.net/cached.php?t=1435099203&amp;f=/js/common.js"></script>

<a id="toTop" href="javascript:;"><span id="toTopHover"></span><img width="40" height="40" alt="To Top" src="/images/to-top@2x.png"></a>

</body>
</html>

