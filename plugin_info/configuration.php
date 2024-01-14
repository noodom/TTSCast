<?php
/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';
include_file('core', 'authentification', 'php');
if (!isConnect()) {
    include_file('desktop', '404', 'php');
    die();
}
?>
<form class="form-horizontal">
    <fieldset>
        <div>
            <legend><i class="fas fa-info"></i> {{Plugin}}</legend>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Version}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Version du plugin à indiquer sur Community}}"></i></sup>
                </label>
                <div class="col-lg-1">
                    <input class="configKey form-control" data-l1key="pluginVersion" readonly />
                </div>
            </div>
            <legend><i class="fas fa-university"></i> {{Démon}}</legend>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Port Socket Interne}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{[ATTENTION] Ne changez ce paramètre qu'en cas de nécessité. (Défaut = 55999)}}"></i></sup>
                </label>
                <div class="col-lg-1">
                    <input class="configKey form-control" data-l1key="socketport" placeholder="55999" />
                </div>
            </div>
            <div class="form-group">
	            <label class="col-lg-3 control-label">{{Fréquence des cycles}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Facteur multiplicateur des cycles du démon (Défaut = 1)}}"></i></sup>
                </label>
	            <div class="col-lg-2">
			        <select class="configKey form-control" data-l1key="cyclefactor">
				        <option value="0.5">{{Plus Rapide - 0.5}}</option>
			            <option value="1" selected>{{Normal - 1 (Recommandé)}}</option>
			            <option value="2">{{Plus Lent - 2}}</option>
			            <option value="3">{{Encore Plus Lent - 3}}</option>
			        </select>
	            </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-lg-3 control-label">{{Durée du cyle (Main)}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Durée du cycle de la boucle 'Main'; Valeur entre 0.5 et 10 (Défaut = 1)}}"></i></sup>
                </label>
                <div class="col-lg-1">
                    <input class="configKey form-control" data-l1key="cyclemain" placeholder="1" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Durée du cyle (FromJeedom)}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Durée du cycle de la boucle 'FromJeedom'; Valeur entre 0.5 et 10 (Défaut = 1)}}"></i></sup>
                </label>
                <div class="col-lg-1">
                    <input class="configKey form-control" data-l1key="cyclefromjeedom" placeholder="1" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Durée du cyle (ToJeedom)}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Durée du cycle de la boucle 'ToJeedom'; Valeur entre 0.5 et 10 (Défaut = 1)}}"></i></sup>
                </label>
                <div class="col-lg-1">
                    <input class="configKey form-control" data-l1key="cycletojeedom" placeholder="1" />
                </div>
            </div> -->
            <legend><i class="fas fa-volume-down"></i> {{TTS (Text To Speech)}}</legend>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Moteur TTS}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Moteur TTS à utiliser pour la synthèse vocale}}"></i></sup>
                </label>
                <div class="col-lg-3">
                    <select class="configKey form-control customform-ttsengine" data-l1key="ttsEngine">
                        <option value="jeedomtts">{{Jeedom TTS (Local)}}</option>
                        <option value="gtranslatetts">{{Google Translate API (Internet)}}</option>
                        <option value="gcloudtts">{{Google Cloud Text-To-Speech (Clé & Internet)}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group customform-lang">
                <label class="col-lg-3 control-label">{{Langue TTS}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Langue à utiliser dans l'API Google Translate et dans Jeedom TTS (Il n'est pas possible choisir une voix, seulement une langue)}}"></i></sup>
                </label>
                <div class="col-lg-2">
                    <select class="configKey form-control" data-l1key="ttsLang">
                        <option value="fr-FR">{{Français (fr-FR)}}</option>
                        <option value="en-US">{{Anglais (en-US)}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group customform-gcloudtts">
                <label class="col-lg-3 control-label">{{Clé API (Google Cloud TTS)}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Uploader votre clé JSON en utilisant le bouton \'Ajouter Clé API\'}}"></i></sup>
                </label>
                <div class="col-lg-3">
                    <input class="configKey form-control custominput-apikey" type="text" data-l1key="gCloudAPIKey" readonly />
                </div>
                <div class="col-lg-2">
                    <a class="btn btn-primary btn-file">
                        <i class="fas fa-cloud-upload-alt"></i> {{Ajouter Clé API (JSON)}}<input class="pluginAction" data-action="uploadAPIKey" type="file" name="fileAPIKey" style="display: inline-block;" accept=".json" />
                    </a>
                    <a class="btn btn-danger customclass-resetapikey"><i class="fas fa-trash-alt"></i> {{Effacer Clé API}}</a>
                </div>
            </div>
            <div class="form-group customform-gcloudtts">
                <label class="col-lg-3 control-label">{{Langue/Voix TTS (Google Cloud)}} [<a style="color:red !important;" target="_blank" href="https://cloud.google.com/text-to-speech/">{{INFOS}}</a>]
                    <sup><i class="fas fa-question-circle tooltips" title="{{Langue et Voix à utiliser avec le moteur Google Cloud TTS}}"></i></sup>
                </label>
                <div class="col-lg-3">
                    <select class="configKey form-control" data-l1key="gCloudTTSVoice">
                        <option value="fr-FR-Standard-A">French (France) - Standard A Female (fr-FR-Standard-A)</option>
                        <option value="fr-FR-Standard-B">French (France) - Standard B Male (fr-FR-Standard-B)</option>
                        <option value="fr-FR-Standard-C">French (France) - Standard C Female (fr-FR-Standard-C)</option>
                        <option value="fr-FR-Standard-D">French (France) - Standard D Male (fr-FR-Standard-D)</option>
                        <option value="fr-FR-Standard-E">French (France) - Standard E Female (fr-FR-Standard-E)</option>
                        <option value="fr-FR-Wavenet-A">French (France) - WaveNet A Female (fr-FR-Wavenet-A)</option>
                        <option value="fr-FR-Wavenet-B">French (France) - WaveNet B Male (fr-FR-Wavenet-B)</option>
                        <option value="fr-FR-Wavenet-C">French (France) - WaveNet C Female (fr-FR-Wavenet-C)</option>
                        <option value="fr-FR-Wavenet-D">French (France) - WaveNet D Male (fr-FR-Wavenet-D)</option>
                        <option value="fr-FR-Wavenet-E">French (France) - WaveNet E Female (fr-FR-Wavenet-E)</option>
                        <option value="fr-FR-Neural2-A">French (France) - Neural2 A Female (fr-FR-Neural2-A)</option>
                        <option value="fr-FR-Neural2-B">French (France) - Neural2 B Male (fr-FR-Neural2-B)</option>
                        <option value="fr-FR-Neural2-C">French (France) - Neural2 C Female (fr-FR-Neural2-C)</option>
                        <option value="fr-FR-Neural2-D">French (France) - Neural2 D Male (fr-FR-Neural2-D)</option>
                        <option value="fr-FR-Neural2-E">French (France) - Neural2 E Female (fr-FR-Neural2-E)</option>
                        <option value="fr-FR-Studio-A">French (France) - Studio A Female (fr-FR-Studio-A)</option>
                        <option value="fr-FR-Studio-D">French (France) - Studio D Male (fr-FR-Studio-D)</option>
                        <option value="fr-FR-Polyglot-1">French (France) - Polyglot 1 Male (fr-FR-Polyglot-1)</option>
                        <option value="sr-RS-Standard-A">Serbian (Serbie) - Standard A Female (sr-RS-Standard-A)</option>
                    </select>
                </div>
            </div>
            <div class="form-group customform-gcloudtts">
                <label class="col-lg-3 control-label">{{Vitesse de parole}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Valeur par défaut = Normal (1.0)}}"></i></sup>
                </label>
                <div class="col-lg-2">
                    <select class="configKey form-control" data-l1key="gCloudTTSSpeed">
                        <option value="0.8">{{Lent (0.8)}}</option>
                        <option value="1.0" selected>{{Normal (1.0)}}</option>
                        <option value="1.2">{{Normal + (1.2)}}</option>
                        <option value="1.25">{{Normal ++ (1.25)}}</option>
                        <option value="1.3">{{Rapide (1.3)}}</option>
                        <option value="1.4">{{Rapide + (1.4)}}</option>
                        <option value="1.6">{{Rapide ++ (1.6)}}</option>
                        <option value="1.8">{{Rapide +++ (1.8)}}</option>
                    </select>
                </div>
            </div>
            <legend><i class="fas fa-clipboard-check"></i> {{Tests}}</legend>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Tester la Synthèse Vocale (TTS)}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Sauvegardez bien votre configuration AVANT d'utiliser le bouton (GENERER + DIFFUSER)}}"></i></sup>
                </label>
                <div class="col-lg-3">
                    <input class="configKey form-control" type="text" data-l1key="ttsTestFileGen" placeholder="{{Bonjour TiTidom, Ceci est un message de test pour la synthèse vocale à partir de Jeedom.}}" />
                </div>
                <div class="col-lg-2">
                    <input class="configKey form-control" type="text" data-l1key="ttsTestGoogleName" placeholder="{{Nest Hub Bureau}}" />
                </div>
                <div class="col-lg-1">
                    <a class="btn btn-success customclass-ttstestplay"><i class="fas fa-play-circle"></i> {{Générer + Diffuser}}</a>
                </div>
            </div>
            <!-- <div class="form-group customform-gcloud">
                <label class="col-lg-3 control-label">{{Delai POST Lecture}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Silence ajouté APRES la lecture (avant de restaurer le volume initial). Valeur de -1000 à 10000 (Défaut = 1300)}}"></i></sup>
                </label>
                <div class="col-lg-2">
                    <input class="configKey form-control" type="number" data-l1key="ttsDelayPostRead" min="-1000" max="10000" placeholder="{{ms (-1000 <-> 10000)}}" />
                </div>
                <div class="col-lg-2">ms (Défaut: 1300)</div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Délai PRE Lecture}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Silence ajouté AVANT la lecture. Permet d'éviter de tronquer le début du fichier. Valeur de 0 à 10000 (Défaut = 300)}}"></i></sup>
                </label>
                <div class="col-lg-2">
                    <input class="configKey form-control" type="number" data-l1key="ttsDelayPreRead" min="0" max="10000" placeholder="{{ms (0 <-> 10000)}}" />
                </div>
                <div class="col-lg-2">ms (Défaut: 300)</div>
            </div> -->
            <legend><i class="fas fa-list-alt"></i> {{Options}}</legend>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{URL Jeedom Externe}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Utilise l'URL externe de Jeedom pour la lecture des fichiers TTS plutôt que l'URL interne (Recommandé = décoché)}}"></i></sup>
                </label>
                <div class="col-lg-2">
                    <input type="checkbox" class="configKey customform-address" data-l1key="ttsUseExtAddr" />
                    <span class="addressTestURL"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Ne PAS utiliser le cache}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Génère les fichiers TTS à chaque demande. Il est vivement recommandé de ne PAS cocher cette case, sauf pour faire des tests}}"></i></sup>
                </label>
                <div class="col-lg-1">
                    <input type="checkbox" class="configKey" data-l1key="ttsDisableCache" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Durée de conservation du cache (jours)}}
                    <sup><i class="fas fa-question-circle tooltips" title="{{Le cache des fichiers TTS générés sera purgé automatiquement tous les X (0 à 90) jours via le cron daily}}"></i></sup>
                </label>
                <div class="col-lg-1">
                    <input class="configKey form-control" type="number" data-l1key="ttsPurgeCacheDays" min="0" max="90" placeholder="{{Nombre de jours}}" />
                </div>
                <div class="col-lg-1">
                    <a class="btn btn-warning customclass-purgettscache"><i class="fas fa-file-audio"></i> {{Vider le Cache}}</a>
                </div>
            </div>
            <!-- <legend><i class="fas fa-comment"></i> {{Notifications}}</legend>
            <div class="form-group">
                <label class="col-lg-3 control-label">{{Désactiver les notifications pour les nouveaux GoogleCast}}</label>
                <div class="col-lg-1">
                    <input type="checkbox" class="configKey" data-l1key="ttsDisableNotifNewCast" />
                </div>
            </div> -->
        </div>
    </fieldset>
</form>

<script>
    function ttsEngineSelect() {
        var val = $('.customform-ttsengine').val();
        if (val == 'gcloudtts') {
            $('.customform-gcloudtts').show();
            $('.customform-gtts').hide();
            $('.customform-lang').hide();
        } else if (val == 'gtranslatetts') {
            $('.customform-gcloudtts').hide();
            $('.customform-gtts').show();
            $('.customform-lang').show();
        } else {
            $('.customform-gcloudtts').hide();
            $('.customform-gtts').hide();
            $('.customform-lang').show();
        }
    }

    $(document).ready(function() {
        ttsEngineSelect();
    });
    $('.customform-ttsengine').on('change', ttsEngineSelect);

    $('.customclass-resetapikey').on('click', function () {
        const fileName = $('.custominput-apikey').val();
        $('.custominput-apikey').val('');
        jeedom.config.save({ 
            plugin: 'ttscast', 
            configuration: { 
                gCloudAPIKey: ''
            },
            error: function (error) {
                $('#div_alert').showAlert({ message: error.message, level: 'danger' });
                return;
            },
            success: function () {
                $('#div_alert').showAlert({ message: '{{Reset Clé API :: Sauvegarde OK}}', level: 'success' });
            }
        });
        $.ajax({
            type: "POST",
            url: "plugins/ttscast/core/ajax/ttscast.ajax.php",
            data: {
                action: "resetAPIKey",
                filename: fileName
            },
            dataType: 'json',
            error: function (request, status, error) {
                handleAjaxError(request, status, error);
            },
            success: function (data) {
                if (data.state != 'ok') {
                    $('#div_alert').showAlert({ message: data.result, level: 'danger' });
                    return;
                }
                $('#div_alert').showAlert({ message: '{{Reset Clé API (OK) :: }}' + data.result, level: 'success' });
            }
        });
    });

    $('.pluginAction[data-action=uploadAPIKey]').on('click', function () {
        $(this).fileupload({
            replaceFileInput: false,
            url: 'plugins/ttscast/core/ajax/ttscast.ajax.php?action=uploadAPIKey',
            dataType: 'json',
            done: function (e, data) {
                if (data.result.state != 'ok') {
                    $('#div_alert').showAlert({ message: data.result.result, level: 'danger' });
                    return;
                }
                $('#div_alert').showAlert({
                    message: '{{Upload Clé API (OK) :: }}' + data.result.result,
                    level: 'success'
                });
                $('.custominput-apikey').val(data.result.result);
                jeedom.config.save({ 
                    plugin: 'ttscast', 
                    configuration: { 
                        gCloudAPIKey: $('.custominput-apikey').val()
                    },
                    error: function (error) {
                        $('#div_alert').showAlert({ message: error.message, level: 'danger' });
                        return;
                    },
                    success: function () {
                        $('#div_alert').showAlert({ message: '{{Upload Clé API :: Sauvegarde OK}}', level: 'success' });
                    }
                });
            }
        });
    });

    $('.customclass-purgettscache').on('click', function() {
        $.ajax({
            type: "POST",
            url: "plugins/ttscast/core/ajax/ttscast.ajax.php",
            data: {
                action: "purgeTTSCache"
            },
            dataType: 'json',
            error: function(request, status, error) {
                handleAjaxError(request, status, error);
            },
            success: function(data) {
                if (data.state != 'ok') {
                    $('#div_alert').showAlert({
                        message: data.result,
                        level: 'danger'
                    });
                    return;
                }
                $('#div_alert').showAlert({
                    message: '{{Demande de purge du cache envoyée (voir les logs du démon pour le résultat)}}',
                    level: 'success'
                });
            }
        });
    });

    $('.customclass-ttstestplay').on('click', function() {
        $.ajax({
            type: "POST",
            url: "plugins/ttscast/core/ajax/ttscast.ajax.php",
            data: {
                action: "playTestTTS"
            },
            dataType: 'json',
            error: function(request, status, error) {
                handleAjaxError(request, status, error);
            },
            success: function(data) {
                if (data.state != 'ok') {
                    $('#div_alert').showAlert({
                        message: data.result,
                        level: 'danger'
                    });
                    return;
                }
                $('#div_alert').showAlert({
                    message: '{{Demande de génération du TTS de test evoyée (voir les logs du démon pour le résultat)}}',
                    level: 'success'
                });
            }
        });
    });

    $('.customform-address').on('change', function() {
        $.ajax({
            type: "POST",
            url: "plugins/ttscast/core/ajax/ttscast.ajax.php",
            data: {
                action: "testExternalAddress",
                value: $('.customform-address').prop('checked')
            },
            dataType: 'json',
            error: function(request, status, error) {
                $('.addressTestURL').text("");
                handleAjaxError(request, status, error);
            },
            success: function(data) {
                var spanContent = ' <a style="color:red !important;" href="' + data.result + '" target="_blank">[TEST]</a>';
                $('.addressTestURL').html(spanContent);
            }
        });
    });
</script>