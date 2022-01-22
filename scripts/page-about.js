class PageAbout extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
        <div class="primary">
                <div class="primary-content">
                    <div class="text-wrapper">
                        <h1 class="title">
                            Будь креативным1,<br>
                            Будь эффектным
                        </h1>
                        <span class="subtitle">
                            Креативный дизайнер и сотрудник социальных сетей
                        </span>
                        <p class="desc">
                            Я должен уметь доносить идеи до широкого
                            круга заинтересованных лиц как своим 
                            голосом, так и голосом Sprout. Общение в 
                            социальных сетях.
                        </p>
                        <div class="actions">
                            <button class="btn btn_primary">Portofolio</button>
                            <button class="btn btn_secondary">Contact me</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="secondary">
                <div class="secondary__wrapper">
                    <img src="/img/me.png" class="secondary-image">
                    <div class="preview-text">
                        <span class="preview-text__title">Igor Prosvirnin</span>
                        <span class="preview-text__subtitle">Самый хороший человек на планете</span>
        
                    </div>
                </div>
            </div>
        `
    }

    disconnectedCallback() {
    }

    static get observedAttributes() {
    }

    attributeChangedCallback(name, oldValue, newValue) {
    }

    adoptedCallback() {
    }

}
customElements.define('page-about', PageAbout)