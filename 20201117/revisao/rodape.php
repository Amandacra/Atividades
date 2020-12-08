<?php
function rodape(){
    $desenvolvedor = $GLOBALS["desenvolvedor"];
    echo "
    </main>
    <nav class='footer text-center navbar-expand-lg'>
        <span class='text-muted'> Site desenvolvido por: $desenvolvedor</span>
    </nav>
    </body>
    </html>
    ";
}
?>