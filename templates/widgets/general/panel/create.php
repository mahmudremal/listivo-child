<?php

use Tangibledesign\Listivo\Widgets\General\PanelWidget;

/* @var PanelWidget $lstCurrentWidget */
global $lstCurrentWidget;

$lstNameRequired = tdf_settings()->getAutoGenerateModelTitleFields()->isEmpty();

if (is_user_logged_in()) :
    get_template_part('templates/widgets/general/panel/header');
endif;
?>
<div class="listivo-panel-section">
    <?php if( is_user_logged_in() ) : ?>
    <lst-panel-model-form
            class="listivo-container"
            request-url="<?php echo esc_url(tdf_action_url('listivo/listings/create')); ?>"
            :initial-model="<?php echo htmlspecialchars(json_encode($lstCurrentWidget->getInitialModel())); ?>"
            :dependency-terms="<?php echo htmlspecialchars(json_encode(tdf_app('dependency_terms'))); ?>"
            error-title-text="<?php echo esc_attr(tdf_string('required_field_is_empty')); ?>"
            error-message-text="<?php echo esc_attr(tdf_string('complete_all_required_fields')); ?>"
            confirm-button-text="<?php echo esc_attr(tdf_string('ok')); ?>"
            error-title="<?php echo esc_attr(tdf_string('something_went_wrong')); ?>"
            error-selector=".listivo-has-error, .listivo-field-error"
            :name-required="<?php echo esc_attr($lstNameRequired ? 'true' : 'false'); ?>"
            :description-required="<?php echo esc_attr(tdf_settings()->descriptionRequired() ? 'true' : 'false'); ?>"
            redirect-url="<?php echo esc_url($lstCurrentWidget->getModelFormRedirectUrl()); ?>"
            nonce="<?php echo esc_attr(wp_create_nonce(tdf_prefix() . '_create_model')); ?>"
            td-nonce="<?php echo esc_attr(wp_create_nonce(tdf_prefix() . '_create_model')); ?>"
        <?php if (!empty($lstCurrentWidget->getPackageId())) : ?>
            :package-id="<?php echo esc_attr($lstCurrentWidget->getPackageId()); ?>"
        <?php endif; ?>
    >
        <div class="listivo-container" slot-scope="modelForm">
            <div class="listivo-panel-section__top">
                <h1 class="listivo-panel-section__label">
                    <?php echo esc_html(tdf_string('add_listing')); ?>
                </h1>

                <?php get_template_part('templates/widgets/general/panel/packages_bar'); ?>
            </div>

            <?php if (!is_user_logged_in()) : ?>
                <div class="listivo-panel-form__not-logged">
                    <?php echo esc_html(tdf_string('you_can_also')) ?> <a
                            href="<?php echo esc_url(tdf_settings()->getLoginPageUrl()) ?>"
                    ><?php echo esc_html(tdf_string('log_in')); ?></a>
                    <?php if (tdf_settings()->userRegistrationOpen()) : ?>
                        <?php echo esc_html(tdf_string('or')); ?> <a
                                href="<?php echo esc_url(tdf_settings()->getRegisterPageUrl()); ?>"
                        ><?php echo esc_html(tdf_string('register')); ?></a>
                    <?php endif; ?>
                    <?php echo esc_html(tdf_string('first.')); ?>
                </div>
            <?php endif; ?>

            <template>
                <div class="listivo-panel-section__form listivo-panel-form">
                    <div class="listivo-panel-form__fields">
                        <div class="listivo-panel-form__single-column">
                            <div class="listivo-panel-form-label listivo-panel-form-label--small-margin-bottom">
                                <h3 class="listivo-panel-form-label__text">
                                    <?php echo esc_html(tdf_string('general_info')); ?>
                                </h3>

                                <div class="listivo-panel-form-label__line"></div>

                                <div class="listivo-panel-form-label__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12"
                                         fill="none">
                                        <path d="M0.195669 7.13805C0.0653349 7.00772 0.00033474 6.83738 0.00033474 6.66671C0.00033474 6.49604 0.0653349 6.32571 0.195669 6.19538C0.456004 5.93504 0.878008 5.93504 1.13834 6.19538L4.66703 9.72407L4.66703 0.666672C4.66703 0.298669 4.9657 0 5.3337 0C5.70171 0 6.00038 0.298669 6.00038 0.666672L6.00038 9.72407L9.52907 6.19538C9.7894 5.93504 10.2114 5.93504 10.4717 6.19538C10.7321 6.45571 10.7321 6.87771 10.4717 7.13805L5.80504 11.8047C5.54471 12.0651 5.1227 12.0651 4.86237 11.8047L0.195669 7.13805Z"
                                              fill="#D5E3EE"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <?php

                        if ($lstNameRequired) :
                            $lstCurrentWidget->getNameField()->loadTemplate();
                        endif;

                        $lstMainCategory = $lstCurrentWidget->getMainCategoryField();
                        if ($lstMainCategory) :
                            $lstMainCategory->loadTemplate();
                        endif;

                        /* @var \Tangibledesign\Framework\Panel\Fields\PanelField $lstField */
                        foreach ($lstCurrentWidget->getMultilevelTaxonomyFields() as $lstField) :
                            if ($lstMainCategory && $lstMainCategory->getKey() === $lstField->getKey()) {
                                continue;
                            }

                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getSingleValueFields() as $lstField) :
                            if ($lstField instanceof \Tangibledesign\Framework\Panel\Fields\NamePanelField) {
                                continue;
                            }

                            if ($lstMainCategory && $lstMainCategory->getKey() === $lstField->getKey()) {
                                continue;
                            }

                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getMultipleValueTaxonomyFields() as $lstField):
                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getDescriptionFields() as $lstField) :
                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getEmbedFields() as $lstField) :
                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getGalleryFields() as $lstField) :
                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getAttachmentsFields() as $lstField) :
                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getRichTextFields() as $lstField) :
                            $lstField->loadTemplate();
                        endforeach;

                        foreach ($lstCurrentWidget->getLocationFields() as $lstField) :
                            $lstField->loadTemplate();
                        endforeach;
                        ?>
                    </div>

                    <div class="listivo-panel-form__bottom">
                        <button
                                class="listivo-button listivo-button--primary-1"
                                :class="{'listivo-button--loading': modelForm.disabled}"
                                :disabled="modelForm.disabled"
                                @click.prevent="modelForm.onSubmit"
                        >
                            <span>
                                <?php echo esc_html(tdf_string('add_listing')); ?>

                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                     fill="none">
                                    <path d="M5.00488 11.525V7.075H0.854883V5.125H5.00488V0.65H7.00488V5.125H11.1549V7.075H7.00488V11.525H5.00488Z"
                                          fill="#FDFDFE"/>
                                </svg>
                            </span>

                            <template>
                                <svg
                                        width='40'
                                        height='10'
                                        viewBox='0 0 120 30'
                                        xmlns='http://www.w3.org/2000/svg'
                                        fill='#fff'
                                        class="listivo-button__loading"
                                >
                                    <circle cx='15' cy='15' r='15'>
                                        <animate attributeName='r' from='15' to='15' begin='0s' dur='0.8s'
                                                 values='15;9;15'
                                                 calcMode='linear' repeatCount='indefinite'/>
                                        <animate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s'
                                                 values='1;.5;1'
                                                 calcMode='linear' repeatCount='indefinite'/>
                                    </circle>

                                    <circle cx='60' cy='15' r='9' fill-opacity='0.3'>
                                        <animate attributeName='r' from='9' to='9' begin='0s' dur='0.8s' values='9;15;9'
                                                 calcMode='linear' repeatCount='indefinite'/>
                                        <animate attributeName='fill-opacity' from='0.5' to='0.5' begin='0s' dur='0.8s'
                                                 values='.5;1;.5' calcMode='linear' repeatCount='indefinite'/>
                                    </circle>

                                    <circle cx='105' cy='15' r='15'>
                                        <animate attributeName='r' from='15' to='15' begin='0s' dur='0.8s'
                                                 values='15;9;15'
                                                 calcMode='linear' repeatCount='indefinite'/>
                                        <animate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s'
                                                 values='1;.5;1'
                                                 calcMode='linear' repeatCount='indefinite'/>
                                    </circle>
                                </svg>
                            </template>
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </lst-panel-model-form>
    <?php else : ?>
    <!-- Start Quick Login & Register -->
    <link rel="stylesheet" href="<?php echo esc_url( FWPLISTIVO_BUILD_LIB_URI . '/css/tailwind-base.css' ); ?>">
    <section class="h-screen">
        <div class="container px-6 py-12 h-full">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
                <img src="<?php echo esc_url( FWPLISTIVO_BUILD_URI . '/icons/quicklogin.svg' ); ?>" class="w-full" alt="Phone image" />
            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
                <form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="listivo-child-custom-quick-login-from">
                    <?php wp_nonce_field( 'listivo-child-custom-quick-login', 'custom-quick-login', true, true ); ?>
                    <!-- Email input -->
                    <div class="mb-6">
                        <input type="text" name="user" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="<?php esc_attr_e( 'User name / Email address', 'domain' ); ?>" required/>
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input type="password" name="pass" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="<?php esc_attr_e( 'Password', 'domain' ); ?>" required />
                    </div>

                    <?php
                    if( false !== ( $msg = get_transient( 'listivo-child-quick-login' ) ) && isset( $msg[ 'error' ] ) ) {
                        delete_transient( 'listivo-child-quick-login' );
                        ?>
                        <!-- Error Message -->
                        <div class="mb-6">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <!-- <strong class="font-bold">Holy smokes!</strong> -->
                                <span class="block sm:inline"><?php echo wp_kses_post( $msg[ 'error' ] ); ?></span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <div class="flex justify-between items-center mb-6">
                        <div class="form-group form-check">
                        <input type="checkbox" name="remember" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" id="remember_me" checked />
                        <label class="form-check-label inline-block text-gray-800" for="remember_me"><?php esc_html_e( 'Remember me', 'domain' ); ?></label>
                        </div>
                        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 duration-200 transition ease-in-out" ><?php esc_html_e( 'Forgot password?', 'domain' ); ?></a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light" ><?php esc_html_e( 'Sign in', 'domain' ); ?></button>

                    <div class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5" >
                        <p class="text-center font-semibold mx-4 mb-0"><?php esc_html_e( 'OR', 'domain' ); ?></p>
                    </div>

                    <a class="px-7 py-3 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full flex justify-center items-center mb-3" style="background-color: #3b5998" href="#!" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light" >
                        <!-- Facebook -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-3.5 h-3.5 mr-2" >
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" /></svg><?php esc_html_e( 'Continue with Facebook', 'domain' ); ?>
                    </a>
                    <a class="px-7 py-3 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full flex justify-center items-center" style="background-color: #55acee" href="#!" role="button" data-mdb-ripple="true" data-mdb-ripple-color="light">
                        <!-- Twitter -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3.5 h-3.5 mr-2" >
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" /></svg><?php esc_html_e( 'Continue with Twitter', 'domain' ); ?>
                    </a>
                </form>
            </div>
            </div>
        </div>
    </section>
    <!-- / End Quick Login & Register -->
    <?php endif; ?>
</div>