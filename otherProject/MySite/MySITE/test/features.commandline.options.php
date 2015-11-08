<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <title>PHP: Опции - Manual </title>

 <link rel="shortcut icon" href="https://php.net/favicon.ico">
 <link rel="search" type="application/opensearchdescription+xml" href="http://php.net/phpnetimprovedsearch.src" title="Add PHP.net search">
 <link rel="alternate" type="application/atom+xml" href="https://php.net/releases/feed.php" title="PHP Release feed">
 <link rel="alternate" type="application/atom+xml" href="https://php.net/feed.atom" title="PHP: Hypertext Preprocessor">

 <link rel="canonical" href="http://php.net/manual/ru/features.commandline.options.php">
 <link rel="shorturl" href="http://php.net/commandline.options">
 <link rel="alternate" href="http://php.net/commandline.options" hreflang="x-default">

 <link rel="contents" href="https://php.net/manual/ru/index.php">
 <link rel="index" href="https://php.net/manual/ru/features.commandline.php">
 <link rel="prev" href="https://php.net/manual/ru/features.commandline.differences.php">
 <link rel="next" href="https://php.net/manual/ru/features.commandline.usage.php">

 <link rel="alternate" href="https://php.net/manual/en/features.commandline.options.php" hreflang="en">
 <link rel="alternate" href="https://php.net/manual/pt_BR/features.commandline.options.php" hreflang="pt_BR">
 <link rel="alternate" href="https://php.net/manual/zh/features.commandline.options.php" hreflang="zh">
 <link rel="alternate" href="https://php.net/manual/fr/features.commandline.options.php" hreflang="fr">
 <link rel="alternate" href="https://php.net/manual/de/features.commandline.options.php" hreflang="de">
 <link rel="alternate" href="https://php.net/manual/ja/features.commandline.options.php" hreflang="ja">
 <link rel="alternate" href="https://php.net/manual/kr/features.commandline.options.php" hreflang="kr">
 <link rel="alternate" href="https://php.net/manual/ro/features.commandline.options.php" hreflang="ro">
 <link rel="alternate" href="https://php.net/manual/ru/features.commandline.options.php" hreflang="ru">
 <link rel="alternate" href="https://php.net/manual/es/features.commandline.options.php" hreflang="es">
 <link rel="alternate" href="https://php.net/manual/tr/features.commandline.options.php" hreflang="tr">

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

 <base href="https://php.net/manual/ru/features.commandline.options.php">

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
        <a href="features.commandline.usage.php">
          Использование &raquo;
        </a>
      </div>
              <div class="prev">
        <a href="features.commandline.differences.php">
          &laquo; Основные отличия от остальных реализаций SAPI        </a>
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
            <option value='en/features.commandline.options.php'>English</option>
            <option value='pt_BR/features.commandline.options.php'>Brazilian Portuguese</option>
            <option value='zh/features.commandline.options.php'>Chinese (Simplified)</option>
            <option value='fr/features.commandline.options.php'>French</option>
            <option value='de/features.commandline.options.php'>German</option>
            <option value='ja/features.commandline.options.php'>Japanese</option>
            <option value='kr/features.commandline.options.php'>Korean</option>
            <option value='ro/features.commandline.options.php'>Romanian</option>
            <option value='ru/features.commandline.options.php' selected="selected">Russian</option>
            <option value='es/features.commandline.options.php'>Spanish</option>
            <option value='tr/features.commandline.options.php'>Turkish</option>
            <option value="help-translate.php">Other</option>
          </select>
        </fieldset>
      </form>
    </div>
    <div class="edit-bug">
      <a href="https://edit.php.net/?project=PHP&amp;perm=ru/features.commandline.options.php">Edit</a>
      <a href="https://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=features.commandline.options">Report a Bug</a>
    </div>
  </div><div id="features.commandline.options" class="section">
  <h2 class="title">Список опций командной строки</h2>
  
  
  <p class="para">
   Список опций, доступный при запуске PHP из командной строки,
   может быть получен в любой момент путем запуска PHP с ключом <strong class="option unknown">-h</strong>
:
   <div class="example-contents screen">
<div class="cdata"><pre>
Usage: php [options] [-f] &lt;file&gt; [--] [args...]
   php [options] -r &lt;code&gt; [--] [args...]
   php [options] [-B &lt;begin_code&gt;] -R &lt;code&gt; [-E &lt;end_code&gt;] [--] [args...]
   php [options] [-B &lt;begin_code&gt;] -F &lt;file&gt; [-E &lt;end_code&gt;] [--] [args...]
   php [options] -- [args...]
   php [options] -a

  -a               Интерактивный запуск
  -c &lt;path&gt;|&lt;file&gt; Ищет файл php.ini в указанной директории
  -n               Не использовать файл php.ini
  -d foo[=bar]     Установить конфигурационную опцию foo значением &#039;bar&#039;
  -e               Генерация дополнительной информации для отладчика и профайлера
  -f &lt;file&gt;        Парсит и исполняет &lt;file&gt;
  -h               Текущая справка
  -i               Выводит информацию о PHP
  -l               Проверка синтаксиса (lint)
  -m               Показать скомпилированные модули
  -r &lt;code&gt;        Запустить PHP-код без использования  &lt;?..?&gt;
  -B &lt;begin_code&gt;  Запустить PHP &lt;begin_code&gt; до обработки введенного кода
  -R &lt;code&gt;        Запустить PHP &lt;code&gt; для каждой введенной строки
  -F &lt;file&gt;        Парсить и выполнять &lt;file&gt; для каждой введенной строки
  -E &lt;end_code&gt;    Запустить PHP &lt;end_code&gt; после обработки всех введенных строк
  -H               Спрятать все переданные аргументы от внешних инструментов
  -S &lt;addr&gt;:&lt;port&gt; Запустить со встроенным веб-сервером.
  -t &lt;docroot&gt;     Указать корень документов &lt;docroot&gt; для встроенного веб-сервера.
  -s               Отображает исходный код с цветной подсветкой
  -v               Выводит информацию о версии PHP
  -w               Отображает исходный текст без комментариев и пробелов
  -z &lt;file&gt;        Загрузить Zend-расширение &lt;file&gt;.

  args...          Аргументы, передаваемые скрипту. Используйте -- args в случае, если
                   первый аргумент начинается с &#039;-&#039; или сам скрипт читается из потока STDIN.

  --ini            Показывать имена конфигурационных файлов

  --rf &lt;name&gt;      Показать информацию о функции &lt;name&gt;.
  --rc &lt;name&gt;      Показать информацию о классе &lt;name&gt;.
  --re &lt;name&gt;      Показать информацию о расширении &lt;name&gt;.
  --rz &lt;name&gt;      Показать информацию о Zend-расширении &lt;name&gt;.
  --ri &lt;name&gt;      Показать конфигурацию для расширения &lt;name&gt;.
</pre></div>
   </div>
  </p>

  <p class="para">
   <table class="doctable table">
    <caption><strong>Опции, доступные из командной строки</strong></caption>
    
     <thead>
      <tr>
       <th>Опция</th>
       <th>Полное название</th>
       <th>Описание</th>
      </tr>

     </thead>

     <tbody class="tbody">
      <tr>
       <td>-a</td>
       <td>--interactive</td>
       <td>
        <p class="para">
         PHP запускается интерактивно. Подробнее смотрите в разделе
         <a href="features.commandline.interactive.php" class="link">Интерактивная консоль</a>.
        </p>
       </td>
      </tr>

      <tr>
       <td>-b</td>
       <td>--bindpath</td>
       <td>
        <p class="para">
         Путь связывания библиотек (Bind Path) для внешнего режима FASTCGI Server (только для <acronym title="Common Gateway Interface">CGI</acronym>).
        </p>
       </td>
      </tr>

      <tr>
       <td>-C</td>
       <td>--no-chdir</td>
       <td>
        <p class="para">
         Не менять текущую директорию на директорию скрипта (только для <acronym title="Common Gateway Interface">CGI</acronym>).
        </p>
       </td>
      </tr>

      <tr>
       <td>-q</td>
       <td>--no-header</td>
       <td>
        <p class="para">
         Тихий режим. Подавляет вывод заголовков <acronym title="Hypertext Transfer Protocol">HTTP</acronym>
         (только для <acronym title="Common Gateway Interface">CGI</acronym>).
        </p>
       </td>
      </tr>

      <tr>
       <td>-T</td>
       <td>--timing</td>
       <td>
        <p class="para">
         Измерить время выполнения скрипта, повторенного <var class="varname"><var class="varname">count</var></var>
         раз (только для <acronym title="Common Gateway Interface">CGI</acronym>).
        </p>
       </td>
      </tr>

      <tr>
       <td>-c</td>
       <td>--php-ini</td>
       <td>
        <p class="para">
         При помощи этой опции можно указать директорию для поиска
         конфигурационного файла <var class="filename">php.ini</var> либо непосредственно
         указать на сам <em>INI</em>-файл (название которого может
         отличаться от стандартного <var class="filename">php.ini</var>), например:
        </p>
        <p class="para"><div class="informalexample">
         <div class="example-contents screen">
<div class="cdata"><pre>
$ php -c /custom/directory/ my_script.php

$ php -c /custom/directory/custom-file.ini my_script.php
</pre></div>
         </div>
        </div></p>
        <p class="para">
         Если эта опция не указана, поиск <var class="filename">php.ini</var> будет осуществлен
         в <a href="configuration.file.php" class="link">обычном месте</a>.
        </p>
       </td>
      </tr>

      <tr>
       <td>-n</td>
       <td>--no-php-ini</td>
       <td>
        <p class="para">
         Полностью игнорировать <var class="filename">php.ini</var>.
        </p>
       </td>
      </tr>

      <tr>
       <td>-d</td>
       <td>--define</td>
       <td>
        <p class="para">
         Устанавливает специальное значение для каждой из
         конфигурационных переменных, доступных в <var class="filename">php.ini</var>. Синтаксис выглядит следующим образом:
         <div class="example-contents screen">
 <div class="cdata"><pre>
 -d configuration_directive[=value]
 </pre></div>
         </div>
        </p>
        <p class="para"><div class="example" id="example-384">
         <div class="example-contents screen">
<div class="cdata"><pre>
# Если значение опущено, то соответствующей опции будет присвоено значение &quot;1&quot;
$ php -d max_execution_time
        -r &#039;$foo = ini_get(&quot;max_execution_time&quot;); var_dump($foo);&#039;
string(1) &quot;1&quot;

# Указание пустого значения установит соответствующую опцию значением &quot;&quot;
php -d max_execution_time=
        -r &#039;$foo = ini_get(&quot;max_execution_time&quot;); var_dump($foo);&#039;
string(0) &quot;&quot;

# Конфигурационная переменная будет установлена любым значением, указанным после символа &#039;=&#039;
$  php -d max_execution_time=20
        -r &#039;$foo = ini_get(&quot;max_execution_time&quot;); var_dump($foo);&#039;
string(2) &quot;20&quot;
$  php
        -d max_execution_time=doesntmakesense
        -r &#039;$foo = ini_get(&quot;max_execution_time&quot;); var_dump($foo);&#039;
string(15) &quot;doesntmakesense&quot;
</pre></div>
         </div>
        </div></p>
       </td>
      </tr>

      <tr>
       <td>-e</td>
       <td>--profile-info</td>
       <td>
        <p class="para">
         Включить режим расширенной информации, используемый
         отладчиком/профайлером.
        </p>
       </td>
      </tr>

      <tr>
       <td>-f</td>
       <td>--file</td>
       <td>
        <p class="para">
         Парсит и исполняет файл, указанный в опции <strong class="option unknown">-f</strong>
.
         Этот переключатель необязателен и может быть убран. Достаточно
         передавать только имя запускаемого файла.
        </p>
        <blockquote class="note"><p><strong class="note">Замечание</strong>: 
         <p class="para">
          Для передачи аргументов в скрипт, первый аргумент должен быть
          <em>--</em>, иначе PHP воспримет их как свои опции.
         </p>
        </p></blockquote>
       </td>
      </tr>

      <tr>
       <td>-h и -?</td>
       <td>--help и --usage</td>
       <td>
        Выводит список актуальных опций вместе с несколькими однострочными
        описаниями.
       </td>
      </tr>

      <tr>
       <td>-i</td>
       <td>--info</td>
       <td>
        Использование этой опции приводит к вызову функции
        <span class="function"><a href="function.phpinfo.php" class="function">phpinfo()</a></span> и выводу результирующей
        информации. В случае, если PHP работает некорректно, будет
        весьма логично выполнить <strong class="command">php -i</strong> и
        посмотреть, выводятся ли сообщения об ошибке до информационных
        таблиц или даже вместо них. Учтите, что в случае использования
        <acronym title="Common Gateway Interface">CGI</acronym>-модуля весь вывод будет в формате
        <acronym title="Hyper Text Markup Language">HTML</acronym> и, как следствие, очень большим.
       </td>
      </tr>

      <tr>
       <td>-l</td>
       <td>--syntax-check</td>
       <td>
        <p class="para">
         Предоставляет удобный способ для проверки заданного
         PHP-кода на наличие синтаксических ошибок.
         В случае успешной проверки будет напечатана следующая фраза:
         &quot;<em>No syntax errors detected in &lt;filename&gt;</em>&quot;,
         - и код возврата будет равен <em>0</em>. А в случае
         неудачи - текст
         &quot;<em>Errors parsing &lt;filename&gt;</em>&quot; вместе с
         внутренними сообщениями парсера и код возврата будет равен <em>-1</em>.
        </p>
        <p class="para">
         Проверка исходного кода при помощи данной опции не находит
         фатальных ошибок (например, таких как вызов неопределенных
         функций). Используйте опцию <strong class="option unknown">-f</strong>
, если вы
         хотите проверить код на наличие фатальных ошибок.
        </p>
        <blockquote class="note"><p><strong class="note">Замечание</strong>: 
         <p class="para">
          Эта опция несовместима с опцией <strong class="option unknown">-r</strong>
.
         </p>
        </p></blockquote>
       </td>
      </tr>

      <tr>
       <td>-m</td>
       <td>--modules</td>
       <td>
        <p class="para"><div class="example" id="example-385">
         <p><strong>Пример #1 Вывод встроенных (и загружаемых) PHP и Zend модулей</strong></p>
         <div class="example-contents screen">
<div class="cdata"><pre>
$ php -m
[PHP Modules]
xml
tokenizer
standard
session
posix
pcre
overload
mysql
mbstring
ctype

[Zend Modules]
</pre></div>
         </div>
        </div></p>
       </td>
      </tr>

      <tr>
       <td>-r</td>
       <td>--run</td>
       <td>
        <p class="para">
         Позволяет выполнять PHP-код, указанный
         непосредственно в командной строке. Открывающие и закрывающие
         PHP-теги (<em>&lt;?php</em> и <em>?&gt;</em>)
         <em class="emphasis">не нужны</em> и, более того,
         приводят к синтаксической ошибке.
        </p>
        <blockquote class="note"><p><strong class="note">Замечание</strong>: 
         <p class="para">
          При использовании этого ключа следует быть очень осторожным и избегать
          недоразумений, связанных с автоматической подстановкой переменных окружения.
         </p>
         <div class="example" id="example-386">
          <p><strong>Пример #2 Ошибка синтаксиса при использовании двойных кавычек</strong></p>
          <div class="example-contents screen">
<div class="cdata"><pre>
$ php -r &quot;$foo = get_defined_constants();&quot;
PHP Parse error:  syntax error, unexpected &#039;=&#039; in Command line code on line 1

Parse error: syntax error, unexpected &#039;=&#039; in Command line code on line 1
</pre></div>
          </div>
         </div>
         <p class="para">
          Проблема заключается в том, что sh/bash выполняет автоматическую
          подстановку переменных в случае, если используются двойные кавычки
          (<em>&quot;</em>). Поскольку переменная <var class="varname"><var class="varname">$foo</var></var>
          вряд ли определена, она заменяется пустой строкой, так что
          передаваемый PHP-код для выполнения выглядит следующим
          образом:
         </p>
         <div class="informalexample">
          <div class="example-contents screen">
<div class="cdata"><pre>
$ php -r &quot; = get_defined_constants();&quot;
</pre></div>
          </div>
         </div>
         
         <p class="para">
          Правильным решением в данном случае будет использование
          одиночных кавычек <em>&#039;</em>, поскольку автоматическая
          подстановка переменных, заключенных в одиночные кавычки, в sh/bash не происходит.
         </p>
         <div class="example" id="example-387">
          <p><strong>Пример #3 Использование одинарных кавычек для предотвращения
          подстановки переменных в консоли</strong></p>
          <div class="example-contents screen">
<div class="cdata"><pre>
$ php -r &#039;$foo = get_defined_constants(); var_dump($foo);&#039;
array(370) {
  [&quot;E_ERROR&quot;]=&gt;
  int(1)
  [&quot;E_WARNING&quot;]=&gt;
  int(2)
  [&quot;E_PARSE&quot;]=&gt;
  int(4)
  [&quot;E_NOTICE&quot;]=&gt;
  int(8)
  [&quot;E_CORE_ERROR&quot;]=&gt;
  [...]
</pre></div>
          </div>
         </div>
         <p class="para">
          При использовании оболочки, отличной от sh/bash, могут возникнуть
          другие вопросы. В таком случае необходимо создать отчет о возникшей ошибке на сайте
          <a href="http://bugs.php.net/" class="link external">&raquo;&nbsp;http://bugs.php.net/</a>.
          Можно столкнуться с проблемами при попытке получить доступ
          к переменным оболочки или при работе с экранирующими обратными слешами.
          Теперь вы предупреждены!
         </p>
        </p></blockquote>
        <blockquote class="note"><p><strong class="note">Замечание</strong>: 
         <p class="para">
          Ключ <strong class="option unknown">-r</strong>
 доступен в <acronym title="Command Line Interpreter/Interface">CLI</acronym> <acronym title="Server Application Programming Interface">SAPI</acronym>, но недоступен
          в <em class="emphasis">CGI</em> <acronym title="Server Application Programming Interface">SAPI</acronym>.
         </p>
        </p></blockquote>
        <blockquote class="note"><p><strong class="note">Замечание</strong>: 
         <p class="para">
          Эта опция предназначена только для самых базовых вещей.
          Поэтому некоторые конфигурационные директивы (например,
          <a href="ini.core.php#ini.auto-prepend-file" class="link">auto_prepend_file</a>
          и <a href="ini.core.php#ini.auto-append-file" class="link">auto_append_file</a>)
          в этом режиме будут проигнорированы.
         </p>
        </p></blockquote>
       </td>
      </tr>

      <tr>
       <td>-B</td>
       <td>--process-begin</td>
       <td>
        <p class="para">
         Выполняемый PHP-код до обработки потока ввода (stdin). Добавлена в PHP 5.
        </p>
       </td>
      </tr>

      <tr>
       <td>-R</td>
       <td>--process-code</td>
       <td>
        <p class="para">
         PHP-код, выполняемый для каждой введенной строки. Добавлена в PHP 5.
        </p>
        <p class="para">
         В этом режиме есть две специальные переменные:
         <var class="varname"><var class="varname">$argn</var></var> и <var class="varname"><var class="varname">$argi</var></var>.
         <var class="varname"><var class="varname">$argn</var></var> содержит строку, которую PHP
         обрабатывает в данный момент, а <var class="varname"><var class="varname">$argi</var></var>
         содержит номер этой строки.
        </p>
       </td>
      </tr>

      <tr>
       <td>-F</td>
       <td>--process-file</td>
       <td>
        <p class="para">
         PHP-файл, выполняемый для каждой введенной строки. Добавлена в PHP 5.
        </p>
       </td>
      </tr>

      <tr>
       <td>-E</td>
       <td>--process-end</td>
       <td>
        <p class="para">
         PHP-код, выполняемый после обработки ввода. Добавлена в PHP 5.
        </p>
        <p class="para"><div class="example" id="example-388">
         <p><strong>Пример #4 Использование опций <strong class="option unknown">-B</strong>
, <strong class="option unknown">-R</strong>
 и
          <strong class="option unknown">-E</strong>
 для подсчета количества строк в
          проекте.
         </strong></p>
         <div class="example-contents screen">
<div class="cdata"><pre>
$ find my_proj | php -B &#039;$l=0;&#039; -R &#039;$l += count(@file($argn));&#039; -E &#039;echo &quot;Всего строк: $l\n&quot;;&#039;
Всего строк: 37328
</pre></div>
         </div>
        </div></p>
       </td>
      </tr>

      <tr>
       <td>-S</td>
       <td>--server</td>
       <td>
        <p class="para">
         Запускает <a href="features.commandline.webserver.php" class="link">встроенный веб-сервер</a>.
         Доступна, начиная с версии PHP 5.4.0.
        </p>
       </td>
      </tr>

      <tr>
       <td>-t</td>
       <td>--docroot</td>
       <td>
        Указывает корень документов для
        <a href="features.commandline.webserver.php" class="link">встроенного веб-сервера</a>.
        Доступна, начиная с версии PHP 5.4.0.
       </td>
      </tr>

      <tr>
       <td>-s</td>
       <td>--syntax-highlight и --syntax-highlighting</td>
       <td>
        <p class="para">
         Показать исходный код с подсвеченным разными цветами синтаксисом.
        </p>
        <p class="para">
         Эта опция использует внутренний механизм для парсинга файла
         и записи в стандартный поток вывода подсвеченную HTML-версию
         этого файла. Учтите, что все что она делает, это генерирует
         блок <em>&lt;code&gt; [...] &lt;/code&gt;</em>
         HTML-тегов, без HTML-заголовков.
        </p>
        <blockquote class="note"><p><strong class="note">Замечание</strong>: 
         <p class="para">
          Эта опция несовместима с опцией <strong class="option unknown">-r</strong>
.
         </p>
        </p></blockquote>
       </td>
      </tr>

      <tr>
       <td>-v</td>
       <td>--version</td>
       <td>
        <p class="para"><div class="example" id="example-389">
         <p><strong>Пример #5 Использование <strong class="option unknown">-v</strong>
 для получения
          типа <acronym title="Server Application Programming Interface">SAPI</acronym> и версии PHP и Zend</strong></p>
         <div class="example-contents screen">
<div class="cdata"><pre>
$ php -v
PHP 5.3.1 (cli) (built: Dec 11 2009 19:55:07)
Copyright (c) 1997-2009 The PHP Group
Zend Engine v2.3.0, Copyright (c) 1998-2009 Zend Technologies
</pre></div>
         </div>
        </div></p>
       </td>
      </tr>

      <tr>
       <td>-w</td>
       <td>--strip</td>
       <td>
        <p class="para">
         Показать исходный код без комментариев и пробелов.
        </p>
        <blockquote class="note"><p><strong class="note">Замечание</strong>: 
         <p class="para">
          Эта опция несовместима с опцией <strong class="option unknown">-r</strong>
.
         </p>
        </p></blockquote>
       </td>
      </tr>

      <tr>
       <td>-z</td>
       <td>--zend-extension</td>
       <td>
        <p class="para">
         Загружает Zend-расширение. Если передано только имя файла,
         PHP попытается загрузить это расширение из вашего системного
         пути поиска библиотек по умолчанию (обычно он указывается в
         <var class="filename">/etc/ld.so.conf</var> в Linux системах).
         Передача файла с абсолютным путем не будет использовать данный
         системный путь поиска. Относительное имя файла, содержащее
         директорию, укажет PHP подгрузить расширение относительно
         текущей директории.
        </p>
       </td>
      </tr>

      <tr>
       <td class="empty">&nbsp;</td>
       <td>--ini</td>
       <td>
        <p class="para">
         Показывает имена конфигурационных файлов и сканируемые директории.
         Доступна, начиная с версии PHP 5.2.3.
         <div class="example" id="example-390">
          <p><strong>Пример #6 Пример <em>--ini</em></strong></p>
          <div class="example-contents">
<div class="shellcode"><pre class="shellcode">$ php --ini
Configuration File (php.ini) Path: /usr/dev/php/5.2/lib
Loaded Configuration File:         /usr/dev/php/5.2/lib/php.ini
Scan for additional .ini files in: (none)
Additional .ini files parsed:      (none)</pre>
</div>
          </div>

         </div>
        </p>
       </td>
      </tr>

      <tr>
       <td>--rf</td>
       <td>--rfunction</td>
       <td>
        <p class="para">
         Показывают информацию об указанной функции или методе
         класса (например, количество и названия параметров).
         Доступна, начиная с версии PHP 5.1.2.
        </p>
        <p class="para">
         Эта опция доступна только в случае если PHP был скомпилирован
         с поддержкой <a href="book.reflection.php" class="link">Reflection</a>.
        </p>
        <p class="para">
         <div class="example" id="example-391">
          <p><strong>Пример #7 Базовое использование <em>--rf</em></strong></p>
          <div class="example-contents">
<div class="shellcode"><pre class="shellcode">$ php --rf var_dump
Function [ &lt;internal&gt; public function var_dump ] {

  - Parameters [2] {
    Parameter #0 [ &lt;required&gt; $var ]
    Parameter #1 [ &lt;optional&gt; $... ]
  }
}</pre>
</div>
          </div>

         </div>
        </p>
       </td>
      </tr>

      <tr>
       <td>--rc</td>
       <td>--rclass</td>
       <td>
        <p class="para">
         Показывает информацию об указанном классе
         (список констант, свойств и методов).
         Доступна, начиная с версии PHP 5.1.2.
        </p>
        <p class="para">
         Эта опция доступна только в случае если PHP был скомпилирован
         с поддержкой <a href="book.reflection.php" class="link">Reflection</a>.
        </p>
        <p class="para">
         <div class="example" id="example-392">
          <p><strong>Пример #8 Пример <em>--rc</em></strong></p>
          <div class="example-contents">
<div class="shellcode"><pre class="shellcode">$ php --rc Directory
Class [ &lt;internal:standard&gt; class Directory ] {

  - Constants [0] {
  }

  - Static properties [0] {
  }

  - Static methods [0] {
  }

  - Properties [0] {
  }

  - Methods [3] {
    Method [ &lt;internal&gt; public method close ] {
    }

    Method [ &lt;internal&gt; public method rewind ] {
    }

    Method [ &lt;internal&gt; public method read ] {
    }
  }
}</pre>
</div>
          </div>

         </div>
        </p>
       </td>
      </tr>

      <tr>
       <td>--re</td>
       <td>--rextension</td>
       <td>
        <p class="para">
         Показывает информацию об указанном расширении
         (список опций <var class="filename">php.ini</var>, определенных функций, констант
         и классов). Доступна, начиная с версии PHP 5.1.2.
        </p>
        <p class="para">
         Эта опция доступна только в случае если PHP был скомпилирован
         с поддержкой <a href="book.reflection.php" class="link">Reflection</a>.
        </p>
        <p class="para">
         <div class="example" id="example-393">
          <p><strong>Пример #9 Пример <em>--re</em></strong></p>
          <div class="example-contents">
<div class="shellcode"><pre class="shellcode">$ php --re json
Extension [ &lt;persistent&gt; extension #19 json version 1.2.1 ] {

  - Functions {
    Function [ &lt;internal&gt; function json_encode ] {
    }
    Function [ &lt;internal&gt; function json_decode ] {
    }
  }
}</pre>
</div>
          </div>

         </div>
        </p>
       </td>
      </tr>

      <tr>
       <td>--rz</td>
       <td>--rzendextension</td>
       <td>
        <p class="para">
         Показывает информацию о конфигурации указанного Zend-расширения
         (та же информация, что показывается функцией <span class="function"><a href="function.phpinfo.php" class="function">phpinfo()</a></span>).
         Доступна, начиная с версии PHP 5.4.0.
        </p>
       </td>
      </tr>

      <tr>
       <td>--ri</td>
       <td>--rextinfo</td>
       <td>
        <p class="para">
         Показывает информацию о конфигурации указанного расширения
         (та же информация, что показывается функцией <span class="function"><a href="function.phpinfo.php" class="function">phpinfo()</a></span>).
         Доступна, начиная с версии PHP 5.2.2.
         Конфигурацию ядра можно узнать, указав в качестве имени
         расширения значение &quot;main&quot;.
        </p>
        <p class="para">
         <div class="example" id="example-394">
          <p><strong>Пример #10 Пример <em>--ri</em></strong></p>
          <div class="example-contents">
<div class="shellcode"><pre class="shellcode">$ php --ri date

date

date/time support =&gt; enabled
&quot;Olson&quot; Timezone Database Version =&gt; 2009.20
Timezone Database =&gt; internal
Default timezone =&gt; Europe/Oslo

Directive =&gt; Local Value =&gt; Master Value
date.timezone =&gt; Europe/Oslo =&gt; Europe/Oslo
date.default_latitude =&gt; 59.930972 =&gt; 59.930972
date.default_longitude =&gt; 10.776699 =&gt; 10.776699
date.sunset_zenith =&gt; 90.583333 =&gt; 90.583333
date.sunrise_zenith =&gt; 90.583333 =&gt; 90.583333</pre>
</div>
          </div>

         </div>
        </p>
       </td>
      </tr>

     </tbody>
    
   </table>

  </p>
  
  <blockquote class="note"><p><strong class="note">Замечание</strong>: 
   <p class="para">
    Опции <em>-rBRFEH</em>, <em>--ini</em> и
    <em>--r[fcezi]</em> доступны только в <acronym title="Command Line Interpreter/Interface">CLI</acronym>.
   </p>
  </p></blockquote>
 </div>
<section id="usernotes">
 <div class="head">
  <span class="action"><a href="/manual/add-note.php?sect=features.commandline.options&amp;redirect=https://php.net/manual/ru/features.commandline.options.php"><img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12'> <small>add a note</small></a></span>
  <h3 class="title">User Contributed Notes <span class="count">1 note</span></h3>
 </div><div id="allnotes">
  <div class="note" id="115853">  <div class="votes">
    <div id="Vu115853">
    <a href="/manual/vote-note.php?id=115853&amp;page=features.commandline.options&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd115853">
    <a href="/manual/vote-note.php?id=115853&amp;page=features.commandline.options&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V115853" title="100% like this...">
    5
    </div>
  </div>
  <a href="#115853" class="name">
  <strong class="user"><em>Ap.Muthu</em></strong></a><a class="genanchor" href="#115853"> &para;</a><div class="date" title="2014-10-03 03:08"><strong>9 months ago</strong></div>
  <div class="text" id="Hcom115853">
<div class="phpcode"><code><span class="html">
If we start the php's built in webserver (PHP v5.4 onwards) with:<br />&nbsp; &nbsp; &nbsp; &nbsp; php -S localhost:8000 -t htdocs<br />and have an image file picture.jpg in it<br />and reference it in a html page with:<br />&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &lt;img src="picture.jpg"&gt;<br />the rendered page will not show the image and the html code behind the image is:<br />&nbsp; &nbsp; &nbsp; &nbsp; <a href="http://localhost:8000/index.php/picture.jpg" rel="nofollow" target="_blank">http://localhost:8000/index.php/picture.jpg</a><br /><br />If however, the html code in the page is:<br />&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &lt;img src="/picture.jpg"&gt;<br />the picture displays correctly.<br /><br />Hence relative addressing is broken in PHP 5.4.33 Win32 VC9 build.</span>
</code></div>
  </div>
 </div></div>

 <div class="foot"><a href="/manual/add-note.php?sect=features.commandline.options&amp;redirect=https://php.net/manual/ru/features.commandline.options.php"><img src='/images/notes-add@2x.png' alt='add a note' width='12' height='12'> <small>add a note</small></a></div>
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
                          
                        <li class="current">
                            <a href="features.commandline.options.php" title="Опции">Опции</a>
                        </li>
                          
                        <li class="">
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

