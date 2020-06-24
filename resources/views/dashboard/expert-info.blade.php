@extends('dashboard.layout')
<!-- begin:: Content -->
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div id="listing_form" class="form-horizontal listing_form">
            {{ csrf_field() }}
            <input hidden type="number" name="userId" id="userId"
                   class="form-control" value="{{$basicInfo['userId'] ?? ''}}">

            <div class="row">
                <div class="col-xl-12 order-lg-12 order-xl-12">

                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand fas fa-user"></i>
                            </span>
                                <h3 class="kt-portlet__head-title">
                                    Welcome Hassan
                                </h3>
                            </div>
                        </div>
                        <div>
                            <p class="ml-4">Please take a moment to setup your expert account.
                            </p>
                        </div>
                        <div class="kt-portlet__body">
                            <input type="hidden" name="yourName" id="user-id"
                                   class="form-control"
                                   placeholder="John Doe" value="{{$basicInfo['userId'] ?? ''}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                    class="input-group-text" style="width: 100%;font-weight: bold!important;">Email</span>
                                        </div>
                                        <input type="text" name="yourName" id="email"
                                               class="form-control"
                                               placeholder="John Doe" value="{{$basicInfo['email'] ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                    class="input-group-text" style="width: 100%;font-weight: bold!important;">Username</span>
                                        </div>
                                        <input type="text" name="username" id="username"
                                               class="form-control"
                                               placeholder="Enter Your Username"
                                               value="{{$basicInfo['username'] ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 23%">
                                            <span
                                                    class="input-group-text" style="width: 100%;font-weight: bold!important;">Cell Phone</span>
                                        </div>
                                        <select name="country_code" id="code">

                                            <option selected="" value="1">+1</option>

                                            <option value="20">+20</option>

                                            <option value="212">+212</option>

                                            <option value="213">+213</option>

                                            <option value="216">+216</option>

                                            <option value="218">+218</option>

                                            <option value="220">+220</option>

                                            <option value="221">+221</option>

                                            <option value="222">+222</option>

                                            <option value="223">+223</option>

                                            <option value="224">+224</option>

                                            <option value="225">+225</option>

                                            <option value="226">+226</option>

                                            <option value="227">+227</option>

                                            <option value="228">+228</option>

                                            <option value="229">+229</option>

                                            <option value="230">+230</option>

                                            <option value="231">+231</option>

                                            <option value="232">+232</option>

                                            <option value="233">+233</option>

                                            <option value="234">+234</option>

                                            <option value="235">+235</option>

                                            <option value="236">+236</option>

                                            <option value="237">+237</option>

                                            <option value="238">+238</option>

                                            <option value="239">+239</option>

                                            <option value="240">+240</option>

                                            <option value="241">+241</option>

                                            <option value="242">+242</option>

                                            <option value="243">+243</option>

                                            <option value="244">+244</option>

                                            <option value="245">+245</option>

                                            <option value="248">+248</option>

                                            <option value="249">+249</option>

                                            <option value="250">+250</option>

                                            <option value="251">+251</option>

                                            <option value="252">+252</option>

                                            <option value="253">+253</option>

                                            <option value="254">+254</option>

                                            <option value="255">+255</option>

                                            <option value="256">+256</option>

                                            <option value="257">+257</option>

                                            <option value="258">+258</option>

                                            <option value="260">+260</option>

                                            <option value="261">+261</option>

                                            <option value="262">+262</option>

                                            <option value="263">+263</option>

                                            <option value="264">+264</option>

                                            <option value="265">+265</option>

                                            <option value="266">+266</option>

                                            <option value="267">+267</option>

                                            <option value="268">+268</option>

                                            <option value="269">+269</option>

                                            <option value="27">+27</option>

                                            <option value="290">+290</option>

                                            <option value="291">+291</option>

                                            <option value="297">+297</option>

                                            <option value="298">+298</option>

                                            <option value="299">+299</option>

                                            <option value="30">+30</option>

                                            <option value="31">+31</option>

                                            <option value="32">+32</option>

                                            <option value="33">+33</option>

                                            <option value="34">+34</option>

                                            <option value="350">+350</option>

                                            <option value="351">+351</option>

                                            <option value="352">+352</option>

                                            <option value="353">+353</option>

                                            <option value="354">+354</option>

                                            <option value="355">+355</option>

                                            <option value="356">+356</option>

                                            <option value="357">+357</option>

                                            <option value="358">+358</option>

                                            <option value="359">+359</option>

                                            <option value="36">+36</option>

                                            <option value="370">+370</option>

                                            <option value="371">+371</option>

                                            <option value="372">+372</option>

                                            <option value="373">+373</option>

                                            <option value="374">+374</option>

                                            <option value="375">+375</option>

                                            <option value="376">+376</option>

                                            <option value="377">+377</option>

                                            <option value="378">+378</option>

                                            <option value="380">+380</option>

                                            <option value="381">+381</option>

                                            <option value="382">+382</option>

                                            <option value="385">+385</option>

                                            <option value="386">+386</option>

                                            <option value="387">+387</option>

                                            <option value="389">+389</option>

                                            <option value="39">+39</option>

                                            <option value="40">+40</option>

                                            <option value="41">+41</option>

                                            <option value="420">+420</option>

                                            <option value="421">+421</option>

                                            <option value="423">+423</option>

                                            <option value="43">+43</option>

                                            <option value="44">+44</option>

                                            <option value="45">+45</option>

                                            <option value="46">+46</option>

                                            <option value="47">+47</option>

                                            <option value="48">+48</option>

                                            <option value="49">+49</option>

                                            <option value="500">+500</option>

                                            <option value="501">+501</option>

                                            <option value="502">+502</option>

                                            <option value="503">+503</option>

                                            <option value="504">+504</option>

                                            <option value="505">+505</option>

                                            <option value="506">+506</option>

                                            <option value="507">+507</option>

                                            <option value="508">+508</option>

                                            <option value="509">+509</option>

                                            <option value="51">+51</option>

                                            <option value="52">+52</option>

                                            <option value="53">+53</option>

                                            <option value="54">+54</option>

                                            <option value="55">+55</option>

                                            <option value="56">+56</option>

                                            <option value="57">+57</option>

                                            <option value="58">+58</option>

                                            <option value="590">+590</option>

                                            <option value="591">+591</option>

                                            <option value="592">+592</option>

                                            <option value="593">+593</option>

                                            <option value="594">+594</option>

                                            <option value="595">+595</option>

                                            <option value="596">+596</option>

                                            <option value="597">+597</option>

                                            <option value="598">+598</option>

                                            <option value="599">+599</option>

                                            <option value="60">+60</option>

                                            <option value="61">+61</option>

                                            <option value="618">+618</option>

                                            <option value="62">+62</option>

                                            <option value="63">+63</option>

                                            <option value="64">+64</option>

                                            <option value="65">+65</option>

                                            <option value="66">+66</option>

                                            <option value="670">+670</option>

                                            <option value="672">+672</option>

                                            <option value="673">+673</option>

                                            <option value="674">+674</option>

                                            <option value="675">+675</option>

                                            <option value="676">+676</option>

                                            <option value="677">+677</option>

                                            <option value="678">+678</option>

                                            <option value="679">+679</option>

                                            <option value="680">+680</option>

                                            <option value="681">+681</option>

                                            <option value="682">+682</option>

                                            <option value="683">+683</option>

                                            <option value="685">+685</option>

                                            <option value="686">+686</option>

                                            <option value="687">+687</option>

                                            <option value="688">+688</option>

                                            <option value="689">+689</option>

                                            <option value="690">+690</option>

                                            <option value="691">+691</option>

                                            <option value="692">+692</option>

                                            <option value="7">+7</option>

                                            <option value="808">+808</option>

                                            <option value="81">+81</option>

                                            <option value="82">+82</option>

                                            <option value="84">+84</option>

                                            <option value="850">+850</option>

                                            <option value="852">+852</option>

                                            <option value="853">+853</option>

                                            <option value="855">+855</option>

                                            <option value="856">+856</option>

                                            <option value="86">+86</option>

                                            <option value="872">+872</option>

                                            <option value="880">+880</option>

                                            <option value="886">+886</option>

                                            <option value="90">+90</option>

                                            <option value="91">+91</option>

                                            <option value="92">+92</option>

                                            <option value="93">+93</option>

                                            <option value="94">+94</option>

                                            <option value="95">+95</option>

                                            <option value="960">+960</option>

                                            <option value="961">+961</option>

                                            <option value="962">+962</option>

                                            <option value="963">+963</option>

                                            <option value="964">+964</option>

                                            <option value="965">+965</option>

                                            <option value="966">+966</option>

                                            <option value="967">+967</option>

                                            <option value="968">+968</option>

                                            <option value="970">+970</option>

                                            <option value="971">+971</option>

                                            <option value="972">+972</option>

                                            <option value="973">+973</option>

                                            <option value="974">+974</option>

                                            <option value="975">+975</option>

                                            <option value="976">+976</option>

                                            <option value="977">+977</option>

                                            <option value="98">+98</option>

                                            <option value="992">+992</option>

                                            <option value="993">+993</option>

                                            <option value="994">+994</option>

                                            <option value="995">+995</option>

                                            <option value="996">+996</option>

                                            <option value="998">+998</option>

                                        </select>
                                        <input type="text" name="username" id="phone-number"
                                               class="form-control"
                                               placeholder="Enter Your Number"
                                               value="{{$basicInfo['cellPhone'] ?? ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 32%"><span
                                                    class="input-group-text" style="width: 100%;font-weight: bold!important;">Your Timezone</span>
                                        </div>
                                        <select name="timeZone" id="time-zone"
                                                class="form-control" value="{{$basicInfo['yourTimezone'] ?? ''}}">
                                            <option value="">Select Timezone</option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Etc/GMT+12" ? 'selected' : ''}} value="Etc/GMT+12">
                                                (GMT-12:00) International Date Line West
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Pacific/Midway" ? 'selected' : ''}} value="Pacific/Midway">
                                                (GMT-11:00) Midway Island, Samoa
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Pacific/Honolulu" ? 'selected' : ''}} value="Pacific/Honolulu">
                                                (GMT-10:00) Hawaii
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "US/Alaska" ? 'selected' : ''}} value="US/Alaska">
                                                (GMT-09:00) Alaska
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Los_Angeles" ? 'selected' : ''}} value="America/Los_Angeles">
                                                (GMT-08:00) Pacific Time (US & Canada)
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Tijuana" ? 'selected' : ''}} value="America/Tijuana">
                                                (GMT-08:00) Tijuana, Baja California
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "US/Arizona" ? 'selected' : ''}} value="US/Arizona">
                                                (GMT-07:00) Arizona
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Chihuahua" ? 'selected' : ''}} value="America/Chihuahua">
                                                (GMT-07:00) Chihuahua, La Paz, Mazatlan
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "US/Mountain" ? 'selected' : ''}} value="US/Mountain">
                                                (GMT-07:00) Mountain Time (US & Canada)
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Managua" ? 'selected' : ''}} value="America/Managua">
                                                (GMT-06:00) Central America
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "US/Central" ? 'selected' : ''}} value="US/Central">
                                                (GMT-06:00) Central Time (US & Canada)
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Mexico_City" ? 'selected' : ''}} value="America/Mexico_City">
                                                (GMT-06:00) Guadalajara, Mexico City,
                                                Monterrey
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Canada/Saskatchewan" ? 'selected' : ''}} value="Canada/Saskatchewan">
                                                (GMT-06:00) Saskatchewan
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Bogota" ? 'selected' : ''}} value="America/Bogota">
                                                (GMT-05:00) Bogota, Lima, Quito, Rio Branco
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "US/Eastern" ? 'selected' : ''}} value="US/Eastern">
                                                (GMT-05:00) Eastern Time (US & Canada)
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "US/East-Indiana" ? 'selected' : ''}} value="US/East-Indiana">
                                                (GMT-05:00) Indiana (East)
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Canada/Atlantic" ? 'selected' : ''}} value="Canada/Atlantic">
                                                (GMT-04:00) Atlantic Time (Canada)
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Caracas" ? 'selected' : ''}} value="America/Caracas">
                                                (GMT-04:00) Caracas, La Paz
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Manaus" ? 'selected' : ''}} value="America/Manaus">
                                                (GMT-04:00) Manaus
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Santiago" ? 'selected' : ''}} value="America/Santiago">
                                                (GMT-04:00) Santiago
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Canada/Newfoundland" ? 'selected' : ''}} value="Canada/Newfoundland">
                                                (GMT-03:30) Newfoundland
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Sao_Paulo" ? 'selected' : ''}} value="America/Sao_Paulo">
                                                (GMT-03:00) Brasilia
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Argentina/Buenos_Aires" ? 'selected' : ''}} value="America/Argentina/Buenos_Aires">
                                                (GMT-03:00) Buenos Aires,
                                                Georgetown
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Godthab" ? 'selected' : ''}} value="America/Godthab">
                                                (GMT-03:00) Greenland
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Montevideo" ? 'selected' : ''}} value="America/Montevideo">
                                                (GMT-03:00) Montevideo
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "America/Noronha" ? 'selected' : ''}} value="America/Noronha">
                                                (GMT-02:00) Mid-Atlantic
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Atlantic/Cape_Verde" ? 'selected' : ''}} value="Atlantic/Cape_Verde">
                                                (GMT-01:00) Cape Verde Is.
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Atlantic/Azores" ? 'selected' : ''}} value="Atlantic/Azores">
                                                (GMT-01:00) Azores
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Africa/Casablanca" ? 'selected' : ''}} value="Africa/Casablanca">
                                                (GMT+00:00) Casablanca, Monrovia,
                                                Reykjavik
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Etc/Greenwich" ? 'selected' : ''}} value="Etc/Greenwich">
                                                (GMT+00:00) Greenwich Mean Time : Dublin,
                                                Edinburgh, Lisbon, London
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Amsterdam" ? 'selected' : ''}} value="Europe/Amsterdam">
                                                (GMT+01:00) Amsterdam, Berlin, Bern, Rome,
                                                Stockholm, Vienna
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Belgrade" ? 'selected' : ''}} value="Europe/Belgrade">
                                                (GMT+01:00) Belgrade, Bratislava, Budapest,
                                                Ljubljana, Prague
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Brussels" ? 'selected' : ''}} value="Europe/Brussels">
                                                (GMT+01:00) Brussels, Copenhagen, Madrid,
                                                Paris
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Sarajevo" ? 'selected' : ''}} value="Europe/Sarajevo">
                                                (GMT+01:00) Sarajevo, Skopje, Warsaw,
                                                Zagreb
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Africa/Lagos" ? 'selected' : ''}} value="Africa/Lagos">
                                                (GMT+01:00) West Central Africa
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Amman" ? 'selected' : ''}} value="Asia/Amman">
                                                (GMT+02:00) Amman
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Athens" ? 'selected' : ''}} value="Europe/Athens">
                                                (GMT+02:00) Athens, Bucharest, Istanbul
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Beirut" ? 'selected' : ''}} value="Asia/Beirut">
                                                (GMT+02:00) Beirut
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Africa/Cairo" ? 'selected' : ''}} value="Africa/Cairo">
                                                (GMT+02:00) Cairo
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Africa/Harare" ? 'selected' : ''}} value="Africa/Harare">
                                                (GMT+02:00) Harare, Pretoria
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Helsinki" ? 'selected' : ''}} value="Europe/Helsinki">
                                                (GMT+02:00) Helsinki, Kyiv, Riga, Sofia,
                                                Tallinn, Vilnius
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Jerusalem" ? 'selected' : ''}} value="Asia/Jerusalem">
                                                (GMT+02:00) Jerusalem
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Minsk" ? 'selected' : ''}} value="Europe/Minsk">
                                                (GMT+02:00) Minsk
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Africa/Windhoek" ? 'selected' : ''}} value="Africa/Windhoek">
                                                (GMT+02:00) Windhoek
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Kuwait" ? 'selected' : ''}} value="Asia/Kuwait">
                                                (GMT+03:00) Kuwait, Riyadh, Baghdad
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Europe/Moscow" ? 'selected' : ''}} value="Europe/Moscow">
                                                (GMT+03:00) Moscow, St. Petersburg,
                                                Volgograd
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Africa/Nairobi" ? 'selected' : ''}} value="Africa/Nairobi">
                                                (GMT+03:00) Nairobi
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Tbilisi" ? 'selected' : ''}} value="Asia/Tbilisi">
                                                (GMT+03:00) Tbilisi
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Tehran" ? 'selected' : ''}} value="Asia/Tehran">
                                                (GMT+03:30) Tehran
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Muscat" ? 'selected' : ''}} value="Asia/Muscat">
                                                (GMT+04:00) Abu Dhabi, Muscat
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Baku" ? 'selected' : ''}} value="Asia/Baku">
                                                (GMT+04:00) Baku
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Yerevan" ? 'selected' : ''}} value="Asia/Yerevan">
                                                (GMT+04:00) Yerevan
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Kabul" ? 'selected' : ''}} value="Asia/Kabul">
                                                (GMT+04:30) Kabul
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Yekaterinburg" ? 'selected' : ''}} value="Asia/Yekaterinburg">
                                                (GMT+05:00) Yekaterinburg
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Karachi" ? 'selected' : ''}} value="Asia/Karachi">
                                                (GMT+05:00) Islamabad, Karachi, Tashkent
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Calcutta" ? 'selected' : ''}} value="Asia/Calcutta">
                                                (GMT+05:30) Chennai, Kolkata, Mumbai, New
                                                Delhi
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Calcutta" ? 'selected' : ''}} value="Asia/Calcutta">
                                                (GMT+05:30) Sri Jayawardenapura
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Katmandu" ? 'selected' : ''}} value="Asia/Katmandu">
                                                (GMT+05:45) Kathmandu
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Almaty" ? 'selected' : ''}} value="Asia/Almaty">
                                                (GMT+06:00) Almaty, Novosibirsk
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Dhaka" ? 'selected' : ''}} value="Asia/Dhaka">
                                                (GMT+06:00) Astana, Dhaka
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Rangoon" ? 'selected' : ''}} value="Asia/Rangoon">
                                                (GMT+06:30) Yangon (Rangoon)
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Bangkok" ? 'selected' : ''}} value="Asia/Bangkok">
                                                (GMT+07:00) Bangkok, Hanoi, Jakarta
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Krasnoyarsk" ? 'selected' : ''}} value="Asia/Krasnoyarsk">
                                                (GMT+07:00) Krasnoyarsk
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Hong_Kong" ? 'selected' : ''}} value="Asia/Hong_Kong">
                                                (GMT+08:00) Beijing, Chongqing, Hong Kong,
                                                Urumqi
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Kuala_Lumpur" ? 'selected' : ''}} value="Asia/Kuala_Lumpur">
                                                (GMT+08:00) Kuala Lumpur, Singapore
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Irkutsk" ? 'selected' : ''}} value="Asia/Irkutsk">
                                                (GMT+08:00) Irkutsk, Ulaan Bataar
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Australia/Perth" ? 'selected' : ''}} value="Australia/Perth">
                                                (GMT+08:00) Perth
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Taipei" ? 'selected' : ''}} value="Asia/Taipei">
                                                (GMT+08:00) Taipei
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Tokyo" ? 'selected' : ''}} value="Asia/Tokyo">
                                                (GMT+09:00) Osaka, Sapporo, Tokyo
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Seoul" ? 'selected' : ''}} value="Asia/Seoul">
                                                (GMT+09:00) Seoul
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Yakutsk" ? 'selected' : ''}} value="Asia/Yakutsk">
                                                (GMT+09:00) Yakutsk
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Australia/Adelaide" ? 'selected' : ''}} value="Australia/Adelaide">
                                                (GMT+09:30) Adelaide
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Australia/Darwin" ? 'selected' : ''}} value="Australia/Darwin">
                                                (GMT+09:30) Darwin
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Australia/Brisbane" ? 'selected' : ''}} value="Australia/Brisbane">
                                                (GMT+10:00) Brisbane
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Australia/Canberra" ? 'selected' : ''}} value="Australia/Canberra">
                                                (GMT+10:00) Canberra, Melbourne, Sydney
                                            </option>
                                            <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Pacific/Guam" ? 'selected' : ''}} value="Pacific/Guam">
                                                (GMT+10:00) Guam, Port Moresby
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Vladivostok" ? 'selected' : ''}} value="Asia/Vladivostok">
                                                (GMT+10:00) Vladivostok
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Asia/Magadan" ? 'selected' : ''}} value="Asia/Magadan">
                                                (GMT+11:00) Magadan, Solomon Is., New
                                                Caledonia
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Pacific/Auckland" ? 'selected' : ''}} value="Pacific/Auckland">
                                                (GMT+12:00) Auckland, Wellington
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Pacific/Fiji" ? 'selected' : ''}} value="Pacific/Fiji">
                                                (GMT+12:00) Fiji, Kamchatka, Marshall Is.
                                            </option>
                                            <option
                                                    {{$basicInfo['yourTimezone'] == "Pacific/Tongatapu" ? 'selected' : ''}} value="Pacific/Tongatapu">
                                                (GMT+13:00) Nuku'alofa
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary" onclick="updateInfo()">Continue</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function updateInfo() {
            let userName = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let cellPhone = document.getElementById('phone-number').value;
            let timeZone = document.getElementById('time-zone').value;
            let userId = document.getElementById('user-id').value;
            if (userName==="" || userName===null){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'User Name cannot be empty!',
                });
                return false;
            }
            if (email==="" || email===null){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Email cannot be empty!',
                });
                return false;
            }
            if (cellPhone === "" || cellPhone === null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Phone Number cannot be empty!',
                });
                return false;
            }
            if (timeZone === "" || timeZone === null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Time Zone cannot be empty!',
                });
                return false;
            }
            $.ajax({
                url: `{{env('APP_URL')}}/api/update/info`,
                type: 'POST',
                dataType: "JSON",
                data: {userName: userName,email:email, cellPhone: cellPhone,timeZone:timeZone,idUser:userId, "_token": "{{ csrf_token() }}"},
                beforeSend: function () {
                    $('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                },
                success: function (result) {
                    // document.getElementById('user_password').value = '';
                    if (result) {
                        console.log(result)
                        window.location.href = `{{env('APP_URL')}}/next/info`
                    } else {
                        setTimeout(function () {
                            alert("server error")
                        }, 3000);
                    }
                },
            });
        }

        {{--$(document).ready(function () {--}}
        {{--window.feed_category_auto_id = 0;--}}
        {{--$('.kt_login_form').on('submit', function (e) {--}}
        {{--var form = $('.kt_login_form');--}}
        {{--var data = form.serializeArray();--}}
        {{--e.preventDefault();--}}
        {{--e.stopImmediatePropagation();--}}
        {{--$.ajax({--}}
        {{--url: `{{env('APP_URL')}}/admin/login`,--}}
        {{--type: 'POST',--}}
        {{--dataType: "JSON",--}}
        {{--data: data,--}}
        {{--beforeSend: function () {--}}
        {{--$('#main-form').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');--}}
        {{--},--}}
        {{--success: function (result) {--}}
        {{--if (result['status']) {--}}
        {{--$(".status-message").html(result['message']);--}}
        {{--$(".overlay").remove();--}}
        {{--} else {--}}
        {{--$(".status-message").html(result['message']);--}}
        {{--$(".overlay").remove();--}}
        {{--}--}}
        {{--}--}}
        {{--});--}}
        {{--});--}}


        {{--});--}}
    </script>
@endsection
