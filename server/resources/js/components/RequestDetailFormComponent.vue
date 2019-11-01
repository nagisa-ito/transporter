<template>
    <div>
        <b-field label="日付">
            <b-datepicker
                placeholder="yyyy-mm-dd"
                icon="calendar-alt">
            </b-datepicker>
        </b-field>

        <div class="columns">
            <div class="column is-4">
                <!-- TODO: optionをDBから持ってくる -->
                <div class="field">
                    <label class="label">分類</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="select is-fullwidth">
                                <select>
                                    <option>通勤費</option>
                                    <option>定期代</option>
                                    <option>営業交通費</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column is-4">
                <div class="field">
                    <label class="label">交通手段</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="select is-fullwidth">
                                <select>
                                    <option>電車</option>
                                    <option>バス</option>
                                    <option>タクシー</option>
                                    <option>飛行機</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column is-4">
                <div class="field">
                    <label class="label">経路</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="select is-fullwidth">
                                <select>
                                    <option>往復</option>
                                    <option>片道</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">訪問先</label>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="text" required>
                        <span class="icon is-small is-left"><i class="fas fa-building"></i></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <!-- TODO: bulma-datepickerを導入 -->
            <label class="label">利用区間</label>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="txt" required placeholder="乗車駅">
                        <span class="icon is-small is-left"><i class="fas fa-train"></i></span>
                    </p>
                </div>
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="txt" required placeholder="降車駅">
                        <span class="icon is-small is-left"><i class="fas fa-train"></i></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">費用</label>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="number" required>
                        <span class="icon is-small is-left"><i class="fas fa-yen-sign"></i></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">概要</label>
            <div class="control">
                <textarea class="textarea"></textarea>
            </div>
        </div>

    </div>
</template>

<script>
</script>
