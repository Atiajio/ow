<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Console extends OW_Controller {

    /**
     * Function qui permet de recuperer la requete vers la console et retourne la reponse
     */
    public function exec(){

        $query = $this->request->getQuery();
        $cmd = $query['cmd'];
        $params = explode(" ", $cmd);
        $cmd_params_clean = array();
        foreach ($params as $token){

            $cmd_params_clean[] = trim($token);

        }

        $data['result'] = $this->real_exec($cmd_params_clean);
        $this->response->setBody($data);
        $this->respond();
    }

    /**
     * Function qui execute reellement la requetes (CMD)
     *
     * @param $params
     * @return string
     */
    public function real_exec($params){

        if (in_array($params[0], array('system', 'application', 'help'))) {

            if ($params[0] == "application") {

                return '<div style="color: #1B5E1A">
                            Command ok !
                    </div>';

            }elseif ($params[0] == "system"){

                return '<div style="color: #1B5E1A">
                            Command ok !
                    </div>';

            }elseif ($params[0] == "help"){

                return '
<div style="color: #1B5E1A">
    <table style="width: 100%">
        <thead style="background-color: white; width: 100%; font-weight: bolder">
            <th>Command</th>
            <th>Options</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        help
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    Command | None
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns the list of available commands and associated options. Then adds a description of the actions of these commands.
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        system
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --version
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns the the actual version of the system.
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --update
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config show 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config set 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config reset 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config delete 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration make 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration migrate 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration rebase  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration export  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration import  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration show  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                      application  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration make 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration migrate 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration rebase  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration export  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration import  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration show  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
            <tr>
                 <td style="color: #1B5E1A;text-align: left;">
                        
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests run  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>
        </tbody>
    </table>
</div>';

            }

        } else {

            return '<div style="color: red">
                            Command not found !
                    </div>';

        }

    }

}