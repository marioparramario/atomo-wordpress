# =========== #
# ATOMO THEME #
# =========== #

LANG_DIR=languages
LANG_POT=$(LANG_DIR)/atomo.pot
LANG_SRC=$(wildcard *.php inc/*.php *.html)


all:

.PHONY: messages
messages: $(LANG_DIR)/atomo.pot $(LANG_DIR)/de_DE.po $(LANG_DIR)/es_CL.po

$(LANG_DIR)/atomo.pot: $(LANG_SRC)
	xgettext --join-existing --from-code=UTF-8 --keyword=__ --keyword=_e --keyword=_n --keyword=_s --no-wrap --language=PHP --copyright-holder=OQGraphic --add-comments --sort-output -o $(LANG_POT) *.{html,php} inc/*.php

$(LANG_DIR)/de_DE.po: $(LANG_POT) $(LANG_SRC)
	msginit --input=$< --output=$@ --locale=de --no-translator

$(LANG_DIR)/es_CL.po: $(LANG_POT) $(LANG_SRC)
	msginit --input=$< --output=$@ --locale=es --no-translator

.PHONY: translations
translations: $(LANG_DIR)/de_DE.mo $(LANG_DIR)/es_CL.mo

$(LANG_DIR)/de_DE.mo: $(LANG_DIR)/de_DE.po
	msgfmt --output-file=$@ $<
$(LANG_DIR)/es_CL.mo: $(LANG_DIR)/es_CL.po
	msgfmt --output-file=$@ $<
