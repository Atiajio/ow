/**
 *  GESTION DES EVENEMENTS DE LA CONSOLE
 */

var console_is_on = false;
var cmd_history = [];
var cmd_last_index = 0;

$(document).ready(function () {

    /**
     * Fonctions utiles pour la console
     */
    function addGettinginfosline(){

        if (console_is_on == false){

            let line = '<div class="ow_terminal_reading_line"> <div>OW_SYSTEM>_</div><input type="text" /></div>';
            $('.ow_terminal_reading_line').removeAttr("keypress");
            $('.ow_terminal_reading_line').removeClass("ow_terminal_reading_line");

            let $line = $(line);

            /**
             * Css READER LINER
             */
            $line.css(
                {
                    display:"flex",
                    fustifyContent:"space-between",
                    fontSize:"10px"
                }
            );

            /**
             * CSS INPUT
             */
            $line.find("input").css(
                {
                    height:"20px",
                    backgroundColor:"black",
                    border:"1px solid black",
                    color:"white",
                    position:"relative",
                    top:"8px",
                    width:"100%",
                    outline: "none"
                }
            );


            $line.find("input").bind('keydown',function (e) {

                /**
                 * Ecoute du clavier pour les touches haut et bas pour parcourir l'historique des commandes
                 */

                if(e.keyCode === 38){
                    /**
                     * Touche haut
                     */
                    if (cmd_last_index -1 >= 0) {

                        $(this).val(cmd_history[cmd_last_index -1]);
                        cmd_last_index--;

                    }
                }

                if(e.keyCode === 40){
                    /**
                     * Touche bas
                     */
                    if (cmd_last_index + 1 < cmd_history.length) {

                        $(this).val(cmd_history[cmd_last_index +1]);
                        cmd_last_index++;

                    }
                }

            });

            /**
             * EVENEMENT lecture du clavier
             */
            $line.find("input").bind('keypress',function (e) {

                if (e.keyCode == 13) {

                    let cmd = $('.ow_terminal_reading_line').find("input").val();

                    /**
                     * History management
                     */

                    if (cmd_history[cmd_history.length - 1] != cmd) {

                        cmd_history.push(cmd);
                        cmd_last_index = cmd_history.length;

                    }

                    if (cmd === "cls"){

                        console_is_on = false;
                        $('.ow_console_viewer div').remove();
                        addGettinginfosline();

                    } else {


                        function success ($result){

                            var div_response = '<div> ' + $result.result +'</div>';
                            var $div_response = $(div_response);


                            $('.ow_console_viewer').append($div_response);
                            console_is_on = false;
                            addGettinginfosline();
                        }

                        function error($result) {

                            var div_response = '<div>' +
                                                    '<p>' + $result.responseText +
                                                    '</p>' +
                                                ' </div>';
                            var $div_response = $(div_response);

                            $('.ow_console_viewer').append($div_response);
                            console_is_on = false;
                            addGettinginfosline();

                        }

                        OW.get('ow_console/exec', {cmd : cmd}, success, error);


                    }
                }

            });

            /**
             * Ajout de la ligne a la console
             */
            $('.ow_console_viewer').append($line);
            $line.find("input").focus();
            console_is_on = true;
        } else {

            $('.ow_terminal_reading_line').find("input").focus();

        }
    }


    /**
     * Gestion du click sur le button de la console
     */

    $('.ow_terminal_link').click(function () {

        $('.ow_console_viewer').toggleClass('ow_console_viewer_invisible');

        if ($('.ow_console_viewer').hasClass('ow_console_viewer_invisible') === false) {

            addGettinginfosline();

        }

    });

    /**
     * Click partout sur le Terminal
     */
    $('.ow_console_viewer').click(function () {
        $('.ow_terminal_reading_line').find("input").focus();
    });
});