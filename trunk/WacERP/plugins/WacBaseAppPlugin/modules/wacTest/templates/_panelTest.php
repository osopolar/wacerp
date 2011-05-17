<div id="container" class="wacPanelContainer">
    <div id="lLeft" class="wacPanelLeft">
        <div id="panelLeft_1" class="wacNavPanel">
            <h3>测试 Left panel #1</h3>
            <div>
		Panel's initial options:
                <ul>
                    <li>collapseType = slide-left</li>
                    <li>width = 300px</li>
                </ul>
                <b>Notes:</b>
                <ul>
                    <li>'slide-left' & 'slide-right' panels automatically create so-called stack area, where all these panels are stacked in collapsed state. This could be overriden with 'stackable' option set to 'false'.</li>
                </ul>
            </div>
        </div>
        <div id="panelLeft_2" class="wacNavPanel">
            <h3>Left panel #2</h3>
            <div>
		Panel's initial options:
                <ul>
                    <li>collapseType = slide-left</li>
                    <li>trueVerticalText = true</li>
                    <li>vHeight = 150px</li>
                    <li>width = 280px</li>
                </ul>
                <b>Notes:</b>
                <ul>
                    <li>'trueVerticalText' option forces collapsed panel's title to be rendered vertically (i.e. rotated, read from bottom to top) in contrast with 'Left panel #1'.</li>
                    <li>'vHeight' option set to '150px' restricts panel's high in folded state.</li>
                    <li>Panels width is set to '280px', so when unfolded it's slightly narrower than 'Left panel #1' and 'Left panel #3'.</li>
                </ul>
            </div>
        </div>
        <div id="panelLeft_3" class="wacNavPanel">
            <h3>Left panel #3</h3>
            <div>
		Panel's initial options:
                <ul>
                    <li>collapseType = slide-left</li>
                    <li>trueVerticalText = true</li>
                    <li>vHeight = 150px</li>
                    <li>width = 300px</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="lRight" class="wacPanelRight">
        <div id="panelRight_1" class="wacNavPanel">
            <h3>Right panel #1</h3>
            <div>
		Panel's initial options:
                <ul>
                    <li>collapseType = slide-right</li>
                    <li>collapsed = true</li>
                    <li>trueVerticalText = true</li>
                    <li>vHeight = 237px</li>
                    <li>width = 200px</li>
                </ul>
                <b>Notes:</b>
                <ul>
                    <li>'collapsed' option set to 'true' tells panel to be initially rendered in collapsed state.</li>
                </ul>
            </div>
        </div>
        <div id="panelRight_2" class="wacNavPanel">
            <h3>Right panel #2</h3>
            <div>
		Panel's initial options:
                <ul>
                    <li>collapseType = slide-right</li>
                    <li>collapsed = true</li>
                    <li>trueVerticalText = true</li>
                    <li>vHeight = 160px</li>
                    <li>width = 200px</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="lCenter" class="wacPanelCenter">
        <div id="desktop" class="wacPanelDesktop">
            <p>
                <b>Feel free to examine html of this page.</b>
            </p>
            <div id="panelCenter_1" style="margin-bottom: 1em;">
                <h3>Central panel #1</h3>
                <div>
                    Panel's initial options:
                    <ul>
                        <li>collapsible = false</li>
                    </ul>
                    <b>Notes:</b>
                    <ul>
                        <li>'collapsible' option set to 'false' allows us to create static non-collapsible panel.</li>
                    </ul>
                </div>
            </div>

            <div style="width:40%;float:left;">
                <div id="panelCenter_2" class="centralPanel">
                    <h3>Central panel #2</h3>
                    <div>
                        Panel's initial options:
                        <ul>
                            <li>draggable = true</li>
                            <li>cookie = {'expires':7}</li>
                        </ul>
                        <b>Notes:</b>
                        <ul>
                            <li>If 'draggable' option is set to 'true' panel uses jQuery UI Draggable plugin and could be dragged by title. Draggable panel overlaps other non-draggable panels.</li>
                            <li>If 'cookie' option is not 'false' panel uses jQuery Cookie plugin to store panel state between sessions. 'cookie' option accepts the same parameters as Cookie plugin (in the example we store cookie for 7 days).</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div style="padding:1.5em;overflow:hidden;">
                <div style="margin-left:1em;">
                    Only one of these accordion-like panels below is opened at a time.<br/>
                    <b>Note:</b> 'accordion' option is set to work with 'my_group' classed controls.
                </div>
                <div class="box">
                    <div id="panelCenter_3_1" class="panel my_group">
                        <h3>Central panel #3 (accordion-like #1)</h3>
                        <div>
                            Just me and you, pal. Just me and you.<br/><br/>
                            Panel's initial options:
                            <ul>
                                <li>accordion = 'my_group'</li>
                            </ul>
                        </div>
                    </div>
                    <div id="panelCenter_3_2" class="panel my_group">
                        <h3>Central panel #3 (accordion-like #2)</h3>
                        <div>
                            Just me and you, pal. Just me and you.<br/><br/>
                            Panel's initial options:
                            <ul>
                                <li>accordion = 'my_group'</li>
                            </ul>
                        </div>
                    </div>
                    <div id="panelCenter_3_3" class="panel my_group">
                        <h3>Central panel #3 (accordion-like #3)</h3>
                        <div>
                            Just me and you, pal. Just me and you.<br/><br/>
                            Panel's initial options:
                            <ul>
                                <li>accordion = 'my_group'</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div style="clear:both"></div>

            <div id="panelCenter_4" class="centralPanel">
                <h3>Central panel #4</h3>
                <div>
                    Panel's initial options:
                    <ul>
                        <li>controls = $('#cntrl').html()</li>
                        <li>collapseSpeed = 1000</li>
                        <li>fold = function() { alert(' "fold" callback executed '); }</li>
                        <li>unfold = function() { alert(' "unfold" callback executed '); }</li>
                    </ul>
                    <b>Notes:</b>
                    <ul>
                        <li>'controls' option allows to place custom content at the right corner of unfolded panel's titlebar (in this example we place there 'Edit' link from hidden div with id=cntrl, examine page source).</li>
                        <li>'collapseSpeed' option helps to ajust the duration of folding/unfolding animation (here animation time set to 1000ms).</li>
                        <li>Functions assigned to 'fold' & 'unfold' actions are called callbacks and are executed when the appropiate action took place.</li>
                    </ul>
                    <b>And more:</b>
                    <ul>
                        <li>You can <span class="fakeLink" onClick="$('#panelCenter_4').panel('disable');$('#pan_enable').show()">disable this panel</span> using .panel('disable').</li>
                        <li>You can <span class="fakeLink" onClick="$('#panelCenter_4').panel('content', 'New content ;)');">replace this content </span> using .panel('content', 'New content ;)').</li>
                        <li>You can <span class="fakeLink" onClick="$('#panelCenter_4').panel('destroy');">destroy this panel </span> using .panel('destroy'). Initial panel content would be restored.</li>
                    </ul>
                </div>
            </div>
            <div id="pan_enable" style="display:none;color:navy;cursor:pointer;" onClick="$('#panelCenter_4').panel('enable');$(this).hide();">Enable panel above using .panel('enable').</div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(
    function(){
        $('#panelLeft_1').panel({
            collapseType:'slide-left',
            width:'300px'
        });
        $('#panelLeft_2').panel({
            collapseType:'slide-left',
            trueVerticalText:true,
            vHeight:'150px',
            width:'280px'
        });
        $('#panelLeft_3').panel({
            collapseType:'slide-left',
            trueVerticalText:true,
            vHeight:'150px',
            width:'300px'
        });
        $('#panelRight_1').panel({
            collapseType:'slide-right',
            collapsed:true,
            trueVerticalText:true,
            vHeight:'237px',
            width:'200px'
        });
        $('#panelRight_2').panel({
            collapseType:'slide-right',
            collapsed:true,
            trueVerticalText:true,
            vHeight:'160px',
            width:'200px'
        });
        $('#panelCenter_1').panel({
            collapsible:false
        });
        $('#panelCenter_2').panel({
            draggable:true,
            cookie:{'expires':7}
        });
        $('#panelCenter_3_1, #panelCenter_3_2, #panelCenter_3_3').panel({
            accordion:'my_group'
        });
        $('#panelCenter_4').panel({
            controls:$('#cntrl').html(),
            collapseSpeed:1000,
            fold: function() { alert(' "fold" callback executed '); },
            unfold: function() { alert(' "unfold" callback executed '); }
        });
    }
);
</script>